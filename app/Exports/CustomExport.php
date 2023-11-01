<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Custom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    protected $date1;
    protected $date2;

    function __construct($date1, $date2) {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $order = Transaction::with(['users', 'customs'])
        ->whereBetween('tgl_selesai', [$this->date1, $this->date2])
        ->where('categories', 'Custom')
        ->where('Status', 'Selesai')
        ->get();

        return $order;
    }

    public function map($order): array
    {
        $items = [];

        foreach($order->customs as $item){
            array_push($items, $item->name);
        }

        return [
            [
                $order->id,
                $order->users->name,
                $order->tgl_transaksi,
                $order->tgl_selesai,
                join(',', $items),
                $order->total_harga
            ],

        ];
    }

    public function headings(): array
    {
        return [
            'Order Id.',
            'Customer',
            'Tgl. Transaksi',
            'tgl. Selesai',
            'Produk',
            'Total Harga'
        ];
    }

    public function title(): string
    {
        return 'Custom';
    }
}
