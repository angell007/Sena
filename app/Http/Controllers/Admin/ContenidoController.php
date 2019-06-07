<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contenido;
use App\Docente;
use App\Ficha;
use App\Competencia;
use App\Disponibilidad;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index($id)
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombre', 'data' => 'competencia_id'],
            ['title' => 'opciones', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.contenidos.datatables', $id));
        $html->setTableAttribute('id', 'contenidos_datatables');

        return view('admin.contenidos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Contenido::where('ficha_id',$id))
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
        // $table->increments('id');
        // $table->string('name');
        // $table->string('dia');
        // $table->string('hora_inicio');
        // $table->string('hora_fin');
        // $table->string('jornada');
        // $table->string('ambiente');

        $contenido = Contenido::create(request()->all());
        return response()->json([
            'flash_now' => ['success', 'Contenido created!'],
            'dismiss_modal' => true,
            'reload_page' => true,
        ]);
    }

    public function updateModal(Contenido $contenido)
    {
        $contenido = Contenido::with('docente','competencia','ficha')->where('id',$contenido->id)->get();
        $docentes  = Docente::all();
        $competencias = Competencia::all();
        return view('admin.contenidos.update', compact('contenido', 'docentes', 'competencias'));
    }

    public function update(Contenido $contenido)
    {
        request()->validate([
            'competencia_id' => 'required',
            'docente_id' => 'required',
            'horas' => 'required'
        ]);

        $contenido->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Contenido updated!'],
            'dismiss_modal' => true,
            'reload_page' => true,
        ]);
    }

    public function delete(Contenido $contenido)
    {
        $contenido->delete();

        return response()->json([
            'flash_now' => ['success', 'Contenido deleted!'],
            'reload_page' => true,
        ]);
    }
}
