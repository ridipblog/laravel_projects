<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;

class EditTableController extends Controller
{
    public function show_edit_table()
    {
        $imgURl = Storage::url('public/images/5/w8BZ5xIZJIIb9StzwFd7AgmjpmqZcRwC1oic1JtH.png');
        return view('edit_data', ['img' => $imgURl]);
    }
    public function download_edit_table(Request $request)
    {

        return Storage::download('public/images/5/w8BZ5xIZJIIb9StzwFd7AgmjpmqZcRwC1oic1JtH.png');
    }
}
