<?php

namespace App\Imports;

use App\Models\Employes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImportView implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Employes::create([
                'student_name' => $row['name'],
                'student_email' => $row['email'],
            ]);
        }
    }
}
