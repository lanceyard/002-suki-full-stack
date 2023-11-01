<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use Illuminate\Support\Integer;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $keyword = $request->keyword;
    $product = Product::where('name', 'LIKE', '%' . $keyword . '%')
      ->orWhere('harga', $keyword)
      ->orWhere('qty', 'LIKE', '%' . $keyword . '%')
      ->orWhere('categories', 'LIKE', '%' . $keyword . '%')
      ->sortable()
      ->paginate(15);
    return view('dashboard.product', ['productList' => $product]);
  }

  public function update(ProductUpdateRequest $request, $id)
  {
    $product = Product::findOrFail($id);

    if ($request->image) {
      File::delete(storage_path('app/public/' . Product::find($id)->image));
      $product->image = $request->image->store('product_image', 'public');
    }

    $price = $request->harga;
    $number = str_replace('.', '', $price);

    $product->name = $request->name;
    $product->desc = $request->desc;
    $product->harga = $number;
    $product->qty = $request->qty;
    $product->categories = $request->categories;
    $product->update();
    if ($product) {
      Session::flash('status', 'success');
      Session::flash('message', 'update data produk sukses!');
    }
    return redirect('/product');
  }

  public function store(ProductRequest $request)
  {
    $newProduct = new Product;

    if ($request->image) {
      $newProduct->image = $request->image->store('product_image', 'public');
    }

    $price = $request->harga;
    $number = str_replace('.', '', $price);

    $newProduct->name = $request->name;
    $newProduct->desc = $request->desc;
    $newProduct->harga = $number;
    $newProduct->qty = $request->qty;
    $newProduct->categories = $request->categories;
    $newProduct->save();

    if ($newProduct) {
      Session::flash('status', 'success');
      Session::flash('message', 'tambah produk baru sukses!');
    }
    return redirect('/product');
  }

  public function destroy(Request $request)
  {
    $ids = $request->ids;

    if($ids != null){
      foreach($ids as $data) {
        File::delete(storage_path('app/public/' . Product::find($data)->image));
      }
      $delete = Product::whereIn('id', $ids);
      $delete->delete();

      if($delete){
          Session::flash('status','success');
          Session::flash('message', 'Hapus data produk sukses.');
      }

      return redirect('/product');
    } else{
      Session::flash('failed','fail');
      Session::flash('message', 'Hapus data produk gagal, belum ada data yang dipilih!');

      return redirect('/product');
    }
  }

  public function pdf()
  {
    $product = Product::sortable()
              ->paginate(1000);

    view()->share(['productList' => $product]);
    $pdf = PDF::loadview('dashboard.pdfproduct')->setPaper('a4', 'landscape');
    return $pdf->download('products report ' . date('Y-m-d') . '.pdf');

    return redirect('/product');
  }

  public function excel(){
    return Excel::download(new ProductExport(), 
    'products report ' . date('Y-m-d') . '.xlsx');

    return redirect('/product');
  }

  // public function index()
  // {
  //   return view('dashboard.product', [
  //     'listings' => Product::latest()->filter(request(['tag', 'search']))->simplePaginate(6),
  //   ]);
  // }

  // public function show(Product $listing)
  // {
  //   return view('listings.show', [
  //     'listing' => $listing,
  //   ]);
  // }

  // public function create()
  // {
  //   return view('listings.create');
  // }

  // public function store(Request $request)
  // {
  //   $formField = $request->validate([
  //     'title' => 'required',
  //     'company' => ['required', Rule::unique("listings", "company")],
  //     'location' => 'required',
  //     'website' => 'required',
  //     'email' => ['required', 'email'],
  //     'tags' => 'required',
  //     'description' => 'required',
  //   ]);

  //   if ($request->hasFile('logo')) {
  //     $formField['logo'] = $request->file('logo')->store('logos', 'public');
  //   }

  //   $formField['user_id'] = auth()->id();

  //   Product::create($formField);

  //   /* Session::flash('message', 'Product Created'); */

  //   /* dd($request->all()); */
  //   return redirect('/listings')->with('message', 'Product Created Successfully');
  // }

  // public function edit(Product $listing)
  // {
  //   return view('listings.edit', ['listing' => $listing]);
  // }

  // public function update(Request $request, Product $listing)
  // {

  //   // biar aman yg login aja
  //   if ($listing->user_id != auth()->id()) {
  //     abort(403, 'Gak boleh brow');
  //   }

  //   $formField = $request->validate([
  //     'title' => 'required',
  //     'company' => ['required'],
  //     'location' => 'required',
  //     'website' => 'required',
  //     'email' => ['required', 'email'],
  //     'tags' => 'required',
  //     'description' => 'required',
  //   ]);

  //   if ($request->hasFile('logo')) {
  //     $formField['logo'] = $request->file('logo')->store('logos', 'public');
  //   }

  //   $listing->update($formField);

  //   /* Session::flash('message', 'Product Created'); */

  //   /* dd($request->all()); */
  //   return back()->with('message', 'Product updated Successfully');
  // }

  // public function destroy(Product $listing)
  // {
  //   // biar aman yg login aja
  //   if ($listing->user_id != auth()->id()) {
  //     abort(403, 'Gak boleh brow');
  //   }

  //   $listing->delete();
  //   return redirect('/listings')->with('message', 'Product deleted successfully');
  // }

  // public function manage()
  // {
  //   return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
  // }
}
