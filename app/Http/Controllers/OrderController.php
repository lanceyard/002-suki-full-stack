<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Custom;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function index(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
          ->where(function ($query){
            $query->where('status', 'Belum_Bayar')
              ->orWhere('status', 'Menunggu_Konfirmasi')
              ->orWhere('status', 'Terkonfirmasi')
              ->orWhere('status', 'Dikirim')
              ->orWhere('status', 'Selesai');
          })
          ->where(function ($query) use ($keyword) {
            $query->where('status', 'LIKE', '%' . $keyword . '%')
              ->orWhereHas('users', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
              })
              ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
              ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
              ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
          })
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query){
        $query->where('status', 'Belum_Bayar')
          ->orWhere('status', 'Menunggu_Konfirmasi')
          ->orWhere('status', 'Terkonfirmasi')
          ->orWhere('status', 'Dikirim')
          ->orWhere('status', 'Selesai')
          ->orWhere(function ($query){
            $query->where('status', 'Pending')
            ->where('total_harga', '!=', 0);
          })
          ->orWhere(function ($query){
            $query->where('status', 'Pending')
            ->whereHas('customs', function ($query){
              $query->where('name', '!=', null);
            });
          });
      })
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function confirm($id){
    $order = Transaction::findOrFail($id);

    $order->status = 'Terkonfirmasi';
    $order->update();
    if ($order) {
      Session::flash('statusOrder', 'success');
      Session::flash('message', 'konfirmasi pembayaran berhasil!');
    }
    return redirect('/order');
  }

  public function send($id){
    $order = Transaction::findOrFail($id);

    $order->status = 'Dikirim';
    $order->update();
    if ($order) {
      Session::flash('statusOrder', 'success');
      Session::flash('message', 'update status transaksi menjadi Dikirim berhasil');
    }
    return redirect('/order');
  }

  public function confirmCustom(Request $request, $id){
    $order = Transaction::findOrFail($id);
    $custom = Custom::where('transaction_id', $id)->first();

    $dp = $request->DP;
    $numberDp = str_replace('.', '', $dp);
    $th = $request->total_harga;
    $numberTh = str_replace('.', '', $th);

    $order->total_harga = $numberTh;
    $order->update();

    $custom->dp = $numberDp;
    $custom->update();

    if ($custom) {
      Session::flash('statusCustom', 'success');
      Session::flash('message', 'order custom berhasil disetujui!');
    }
    return redirect('/order');
  }

  public function tolakCustom($id){
    $order = Transaction::findOrFail($id);

    $order->status = 'Gagal';
    $order->update();

    if ($order) {
      Session::flash('statusCustom', 'success');
      Session::flash('message', 'order custom berhasil ditolak!');
    }
    return redirect('/order');
  }

  public function customConfirm($id){
    $order = Transaction::findOrFail($id);
    $custom = Custom::where('transaction_id', $id)->first();

    $order->status = 'Terkonfirmasi';
    $order->update();

    $custom->status = 'Pengerjaan';
    $custom->update();

    if ($custom) {
      Session::flash('statusCustom', 'success');
      Session::flash('message', 'konfirmasi pembayaran berhasil!');
    }
    return redirect('/order');
  }

  public function customSend($id){
    $order = Transaction::findOrFail($id);
    $custom = Custom::where('transaction_id', $id)->first();

    $order->status = 'Dikirim';
    $order->update();

    $custom->status = 'Selesai';
    $custom->update();

    if ($custom) {
      Session::flash('statusCustom', 'success');
      Session::flash('message', 'update status transaksi menjadi Dikirim berhasil.');
    }
    return redirect('/order');
  }

  public function customDelete($id){
    $order = Transaction::findOrFail($id);
    $custom = Custom::where('transaction_id', $order->id)->get();
    if(count($custom) != 0){
      for ($i=0; $i < count($custom); $i++) { 
        $custom[$i]->delete();
      }
    }
    $order->delete();

    if ($order) {
      Session::flash('statusCustom', 'success');
      Session::flash('message', 'Order custom berhasil dihapus');
    }
    return redirect('/order');
  }

  public function pending(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
          ->where(function ($query){
            $query->where('status', 'p');
          })
          ->where(function ($query) use ($keyword) {
            $query->where('status', 'LIKE', '%' . $keyword . '%')
              ->orWhereHas('users', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
              })
              ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
              ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
              ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
          })
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query){
        $query->where(function ($query){
            $query->where('status', 'Pending')
            ->where('total_harga', '!=', 0);
          })
          ->orWhere(function ($query){
            $query->where('status', 'Pending')
            ->whereHas('customs', function ($query){
              $query->where('name', '!=', null);
            });
          });
      })
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function belumBayar(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Belum_Bayar')
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Belum_Bayar')
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function mKonfirmasi(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Menunggu_Konfirmasi')
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Menunggu_Konfirmasi')
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function terkonfirmasi(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Terkonfirmasi')
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Terkonfirmasi')
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function dikirim(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Dikirim')
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Dikirim')
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }

  public function selesai(Request $request)
  {
    $keyword = $request->keyword;

    $order = Transaction::with(['users', 'products'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Selesai')
      ->where('categories', 'Product')
      ->sortable()
      ->paginate(10);

    $custom = Transaction::with(['users', 'customs'])
      ->where(function ($query) use ($keyword) {
        $query->where('status', 'LIKE', '%' . $keyword . '%')
          ->orWhereHas('users', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
          })
          ->orWhere('total_harga', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_transaksi', 'LIKE', '%' . $keyword . '%')
          ->orWhere('tgl_selesai', 'LIKE', '%' . $keyword . '%');
      })
      ->where('status', 'Selesai')
      ->where('categories', 'Custom')
      ->sortable()
      ->paginate(10);

    return view('dashboard.order', ['orderList' => $order, 'customList' => $custom]);
  }
}
