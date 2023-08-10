<?php

namespace App\Exports;


use App\Models\Employes;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ModifyExcel implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employes::all();
    }
    public function view(): View
    {
        return view('exports.student-export', [
            'students' => Employes::all()
        ]);
    }
}
