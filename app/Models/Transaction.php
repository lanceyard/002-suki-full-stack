<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{
  use HasFactory, Sortable;

  protected $table = 'transactions';
  protected $fillable = [
    'user_id',
    'total_harga',
    'tgl_transaksi',
    'tgl_selesai',
    'categories',
    'status'
  ];

  public $sortable = [
    'status', 'total_harga', 'tgl_transaksi', 'tgl_selesai'
  ];

  public function users()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  public function products()
  {
    return $this->belongsToMany(
      Product::class,
      'transaction_details',
      'transaction_id',
      'product_id'
    )->withPivot(['qty', 'sub_total'])->withTrashed();
  }

  public function customs()
  {
    return $this->hasMany(Custom::class);
  }
}
