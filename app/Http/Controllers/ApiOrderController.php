<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiOrderController extends Controller
{
  // index cart
  public function index()
  {
    $ongoing = auth()->user()->transactions()->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first();
    $ongoingCustom = auth()->user()->transactions()->where('status', "Pending")
      ->where('categories', "Custom")
      ->latest('id')->first();
    $orders = auth()->user()->transactions()->where('categories', "Product")->latest('id')->get();
    $customs = auth()->user()->transactions()->where('categories', "Custom")->latest('id')->get();
    return response()->json(['ongoing' => $ongoing, 'ongoingCustom' => $ongoingCustom, 'orders' => $orders, 'customs' => $customs]);
  }

  public function store(Request $request)
  {
    // anggep aja checkout
    // check latest transaksi -> update ke belum bayar
    $orders = auth()->user()->transactions()->where('status', "Pending")
      ->where('categories', "Product")
      ->latest('id')->first();
    $orders->status = "Belum_Bayar";
    $orders->alamat = auth()->user()->address;
    $orders->total_harga = $request->total_harga;
    $orders->tgl_transaksi = Carbon::now()->toDateTimeString();
    $orders->save();

    // buat "transaksi" baru buat keranjang
    $new = Transaction::create([
      'user_id' => auth()->user()->id,
    ]);
    return response()->json(['results' => $new]);
  }
  public function upload(Request $request, $id)
  {
    $transaction = Transaction::find($id);

    // update stuff di transaksi
    if ($request->image) {
      File::delete(storage_path('app/public/' . $transaction->image));
      $transaction['bukti_bayar'] = $request->image->store('bukti_pembayaran', 'public');
    }
    if ($request->alamat) {
      $transaction->address = $request->alamat;
    }

    return response()->json(['results' => $transaction->update()]);
  }
  public function changeStatus(Request $req, $id)
  {
    $transaction = Transaction::find($id);

    // update stuff di transaksi
    if ($req->status) {
      $transaction['status'] = $req->status;
    }

    if ($req->status == "Selesai") {
      $transaction->tgl_selesai = Carbon::now()->toDateTimeString();
    }

    return response()->json(['results' => $transaction->update()]);
  }
}
