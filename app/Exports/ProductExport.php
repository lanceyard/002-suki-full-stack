<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    public function collection()
    {
        $product = Product::sortable()
              ->paginate(1000);

        return $product;
    }

    public function map($product): array
    {
        return [
            [
                $product->id,
                $product->name,
                $product->harga,
                $product->qty,
                $product->categories,
            ],

        ];
    }

    public function headings(): array
    {
        return [
            'Product Id.',
            'Name',
            'Harga',
            'Qty',
            'Kategori'
        ];
    }

    public function title(): string
    {
        return 'Produk';
    }
}
