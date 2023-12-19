<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xls', \Maatwebsite\Excel\Excel::XLS, ['Content-Type' => 'text/xls',]);
    }
    public function addData(Request $request)
    {
        for ($i = 1; $i <= 10; $i++) {
            EmployeeModel::create([
                'name' => 'employee ' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'phone' => '11212' . $i
            ]);
        }
        dd("Data Added");
    }
}
