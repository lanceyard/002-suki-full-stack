<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ApiDetailOrderController extends Controller
{
  public function index()
  {

    $id = auth()->user()->id;

    $ongoing = Transaction::find(auth()->user()->transactions()
      ->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first()->id)->products()->get();
    $details = Transaction::with('products')->where('user_id', auth()->user()->id)->get();

    return response()->json([
      'results' => $ongoing,
      'details' => $details
    ]);
  }

  public function store(Request $request)
  {
    $ongoing = Transaction::find(auth()->user()->transactions()
      ->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first()->id);

    $product = Product::find($request->product_id);

    if ($product->qty > 0) {
      $product->qty -= 1;
      $product->update();

      return response()->json(['results' => $ongoing->products()->attach($request->product_id)]);
    } else {
      return response()->json(['message' => "Furnitur kosong"]);
    }
  }

  public function show($id)
  {
    return response()->json(['results' => TransactionDetail::where('transaction_id', $id)->get()]);
  }

  public function update(Request $request)
  {

    $data = [
      'qty' => $request->qty,
      'sub_total' => $request->sub_total
    ];

    $ongoing = Transaction::find(auth()->user()->transactions()
      ->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first()->id);

    $product = Product::find($request->product_id);
    $detail = TransactionDetail::where('transaction_id', auth()->user()->transactions()
      ->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first()->id)
      ->where('product_id', $request->product_id)->first();

    // dd("requestnya {$request->qty}, di isinya {$detail->qty}");
    if ($request->qty > $detail->qty) {
      if ($product->qty > 0) {
        $product->qty -= 1;
      } else {
        return response()->json(['message' => "Furnitur kosong"], 403);
      }
    } else {
      $product->qty += 1;
    }
    $product->update();
    return response()->json(['results' => $ongoing->products()->updateExistingPivot($request->product_id, $data)]);
  }

  public function destroy(Request $request)
  {
    $ongoing = Transaction::find(auth()->user()->transactions()
      ->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first()->id);
    return response()->json(['results' => $ongoing->products()->detach($request->product_id)]);
  }
}
