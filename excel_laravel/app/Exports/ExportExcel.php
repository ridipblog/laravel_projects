<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ['id'];
    }
    public function collection()
    {
        $userData = DB::table('all_employe_details')->select('id')->orderBy('id', 'desc')->limit(2)->get()->toArray();
        return collect($userData);
    }
}
