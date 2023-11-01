<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $topProduct = Product::withSum(
      ['transactions' => fn ($query) => $query
        ->where('status', 'Selesai')],
      'transaction_details.qty'
    )
      ->orderBy('transactions_sum_transaction_detailsqty', 'DESC')
      ->limit(5)
      ->get();
    //
    return response()->json([
      'results' => Product::all(),
      'topProduct' => $topProduct
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $formField = $request->validate([
      'name' => 'required',
      'desc' => 'required',
      'harga' => 'required',
      'categories' => 'required',
    ]);

    if ($request->hasFile('image')) {
      $formField['image'] = $request->file('image')->store('image', 'public');
    }

    return Product::create($formField);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
    return Product::find($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);

    $product->update($request->validate([
      'name' => 'required',
      'desc' => 'required',
      'harga' => 'required',
      'categories' => 'required',
    ]));

    return $product;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Product::destroy($id);
  }

  /**
   * Requestttt Search
   *
   * @return \Illuminate\Http\Response
   */
  public function search()
  {
    return Product::latest()->filter(request(['search', 'categories']))->get();
  }
}
