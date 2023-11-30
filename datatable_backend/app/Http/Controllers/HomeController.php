<?php

namespace App\Http\Controllers;

use App\Models\EmployesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
    public function getData()
    {
        // $data = EmployesModel::select('name');
        $id = $_GET['id'];
        $data = DB::table('employes')
            ->select('name', 'depertment')
            ->get();
        return DataTables::of($data)->make(true);
    }
}
