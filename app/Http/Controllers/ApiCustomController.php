<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApiCustomController extends Controller
{
  public function index()
  {
    //
    $details = Transaction::with('customs')
      ->where('user_id', auth()->user()->id)
      ->where('categories', 'Custom')
      ->get();

    return response()->json([
      'details' => $details
    ]);
  }

  public function create()
  {
  }

  public function store(Request $request)
  {
    $formField = $request->validate([
      'name' => 'required|min:6',
      'desc' => 'required|min:6',
    ]);

    // check latest transaksi
    $customs = auth()->user()->transactions()->where('status', "Pending")
      ->where('categories', "Custom")
      ->latest('id')->first();

    Custom::create([
      'transaction_id' => $customs->id,
      'name' => $request->name,
      'status' => "Pending",
      'desc' => $request->desc,
      'jenis_custom' => $request->jenis_custom,
      'bahan' => $request->bahan,
    ]);

    $customs->alamat = auth()->user()->address;
    $customs->tgl_transaksi = Carbon::now()->toDateTimeString();
    $customs->save();

    // buat "transaksi" baru buat keranjang
    $new = Transaction::create([
      'user_id' => auth()->user()->id,
      'categories' => "Custom"
    ]);
    return response()->json(['results' => $new]);
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function updateCustom(Request $req, $id)
  {
    $transaction = Transaction::find($id);
    $custom = Custom::where('transaction_id', $id)->get()->first();

    // update stuff di transaksi
    if ($req->status) {
      $transaction['status'] = $req->status;
    }

    if ($req->status == "Belum_Bayar") {
      $custom->status = "Disetujui";
      $custom->update();
    }

    if ($req->status == "Selesai") {
      $transaction->tgl_selesai = Carbon::now()->toDateTimeString();
    }

    return response()->json(['results' => $transaction->update()]);
  }
}
