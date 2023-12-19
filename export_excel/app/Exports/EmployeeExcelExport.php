<?php

namespace App\Exports;

use App\Models\EmployeeModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExcelExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return DB::table('employee')
    //         ->select('name', 'email')
    //         ->get();
    // }
    public function view(): View
    {
        $employees = DB::table('employee')

            ->get();
        return view('exports.employee', [
            'employees' => $employees
        ]);
    }
}
