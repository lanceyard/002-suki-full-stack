<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiTransactionExport implements WithMultipleSheets
{
    protected $date1;
    protected $date2;

    function __construct($date1, $date2) {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function sheets(): array
    {
        return [
            'Produk' => new TransactionsExport($this->date1, $this->date2),
            'Custom' => new CustomExport($this->date1, $this->date2),
        ];
    }
}
