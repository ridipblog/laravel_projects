<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmployeePDFController extends Controller
{
    public function addData(Request $request)
    {
        for ($i = 1; $i <= 10; $i++) {
            EmployeeModel::create([
                'name' => 'employee ' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'phone' => '32322' . $i
            ]);
        }
        dd("Data Added");
    }
    public function employeePDFExport(Request $request)
    {
        $data = EmployeeModel::all();
        $views = [
            'title' => 'Thanks For View Our Page',
            'date' => date('m/d/Y'),
            'employees' => $data
        ];


        // view()->share('employes', $data);
        $pdf = PDF::loadView('export.employeeexport', $views);
        return $pdf->download('pdf.pdf');
    }
}
