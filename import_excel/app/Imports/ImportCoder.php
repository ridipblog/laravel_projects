<?php

namespace App\Imports;

use App\Models\CoderModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCoder implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            CoderModel::create([
                'name' => $row['name'],
                'email' => $row['email']
            ]);
        }
    }
}
