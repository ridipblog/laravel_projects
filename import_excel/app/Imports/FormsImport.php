<?php

namespace App\Imports;

use App\Models\FormsModel;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public $status;
    public function __construct($status)
    {
        $this->status = $status;
    }

    public function collection(Collection $collection)
    {
        $count = 0;
        $name = "name";
        foreach ($collection as $coll) {
            if ($count != 0) {
                if (isset($coll['full_name'])) {
                    FormsModel::create([
                        $name => $coll['full_name'],
                        'email' => $coll['compensationin_rs'],
                        'status' => $this->status
                    ]);
                }
            }
            $count++;
        }
    }
}
