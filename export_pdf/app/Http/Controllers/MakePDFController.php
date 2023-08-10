<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MakePDFController extends Controller
{
    public function export_pdf()
    {
        $employes = Employe::all();
        return view('employe', ['employes' => $employes, 'title' => 'Nothing']);
    }
    public function createPDF()
    {
        $data = Employe::all();
        $views = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'employes' => $data
        ];


        // view()->share('employes', $data);
        $pdf = PDF::loadView('employe', $views);
        return $pdf->download('pdf.pdf');
    }
}
