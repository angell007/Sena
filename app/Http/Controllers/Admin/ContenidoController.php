<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contenido;
use App\Docente;
use App\Competencia;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombre', 'data' => 'competencia_id'],
            ['title' => 'opciones', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.contenidos.datatables'));
        $html->setTableAttribute('id', 'contenidos_datatables');

        return view('admin.contenidos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Contenido::all())
            ->editColumn('actions', function ($contenido) {
                return view('admin.contenidos.datatables.actions', compact('contenido'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal($id)
    {
        $docentes = Docente::select('id','name','apellido')->get();
        $competencias = Competencia::select('name','id')->get();
        return view('admin.contenidos.create', compact('id','docentes','competencias'));
    }

    public function create($id)
    {
        $contenido = Contenido::create(request()->all());
        // return redirect()->route(['admin.fichas.show', compact('id'),'dismiss_modal' => true,]);
        return response()->json([
            'flash_now' => ['success', 'Contenido created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Contenido $contenido)
    {
        return view('admin.contenidos.update', compact('contenido'));
    }

    public function update(Contenido $contenido)
    {
        request()->validate([
            'name' => 'required|unique:contenidos,name,' . $contenido->id,
        ]);

        $contenido->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Contenido updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Contenido $contenido)
    {
        $contenido->delete();

        return response()->json([
            'flash_now' => ['success', 'Contenido deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
