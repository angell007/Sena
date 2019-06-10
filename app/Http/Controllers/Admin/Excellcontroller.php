<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ambiente;
use DB;
use App\Exports\AmbienteExport;
use Maatwebsite\Excel\Facades\Excel;

class Excellcontroller extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel()
    {
        return Excel::download(new AmbienteExport, 'ambientes.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }

            if(!empty($arr)){
                Item::insert($arr);
            }
        }

        return back()->with('success', 'Insert Record successfully.');
    }
}
