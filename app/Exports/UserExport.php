<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    public function collection()
    {
        $user = User::with('roles')
              ->whereHas('roles', function($query){
                $query->where('name', 'User');
              })
              ->sortable()
              ->paginate(15);

        return $user;
    }

    public function map($user): array
    {
        return [
            [
                $user->id,
                $user->name,
                $user->phone,
                $user->username,
                $user->email,
                $user->address
            ],

        ];
    }

    public function headings(): array
    {
        return [
            'User Id.',
            'Name',
            'No. Telepon',
            'Username',
            'Email',
            'Alamat'
        ];
    }

    public function title(): string
    {
        return 'User';
    }
}
