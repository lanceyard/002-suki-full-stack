<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Custom extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'transaction_id',
        'name',
        'status',
        'desc',
        'jenis_custom',
        'bahan',
        'desc',
        'dp',
    ];

    public $sortable =[
      'status', 'name', 'jenis_custom', 'total_harga', 'dp', 'bahan'
    ];

    public function transactions()
  {
    return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
  }
}
