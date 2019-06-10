<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ficha;
use App\Contenido;
use App\Docente;

class FichaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombre', 'data' => 'name'],
            ['title' => '#', 'data' => 'ref'],

            ['title' => 'Modalidad', 'data' => 'modalidad_id'],
            ['title' => 'Trimestr', 'data' => 'trimestre_formacion'],
            ['title' => 'Jornada', 'data' => 'jornada'],
            ['title' => 'intensidad horaria ', 'data' => 'horas'],


            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.fichas.datatables'));
        $html->setTableAttribute('id', 'fichas_datatables');

        return view('admin.fichas.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Ficha::query())
            ->editColumn('actions', function ($ficha) {
                return view('admin.fichas.datatables.actions', compact('ficha'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        // $modalidades = Modalidad::select('name','id')->get();
        return view('admin.fichas.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:fichas',
        ]);

        $ficha = Ficha::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Ficha created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Ficha $ficha)
    {
        // $contenidos = Ficha::findOrFail('ficha_id',$ficha->id)->get();
        // return view('ficha.edit', compact('contenidos','ficha'));
        return view('admin.fichas.update', compact('ficha'));
    }

    public function update(Ficha $ficha)
    {
        request()->validate([
            'name' => 'required|unique:fichas,name,' . $ficha->id,
        ]);

        $ficha->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Ficha updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Ficha $ficha)
    {
        $ficha->delete();

        return response()->json([
            'flash_now' => ['success', 'Ficha deleted!'],
            'reload_datatables' => true,
        ]);
    }

    public function show(Ficha $ficha)
    {

        $id = $ficha->id;
        $contenidos = Contenido::with('docente','competencia','ficha')->where('ficha_id',$ficha->id)->get();
        return view('admin.fichas.show', compact('contenidos', 'id','ficha'));
    }

}
