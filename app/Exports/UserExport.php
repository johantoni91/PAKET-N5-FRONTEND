<?php

namespace App\Exports;

use App\API\UserApi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(UserApi::get()['data']['data']);
    }

    public function headings(): array
    {
        return [
            'Id', 'Username', 'Name', 'Email', 'Phone'
        ];
    }

    public function map($loguser): array
    {
        return [
            $loguser['users']['id'],
            $loguser['users']['username'],
            $loguser['users']['name'],
            $loguser['users']['email'],
            $loguser['users']['phone']
        ];
    }
}
