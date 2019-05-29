<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Docente;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombres', 'data' => 'name'],
            ['title' => 'Apellido', 'data' => 'apellido'],
            ['title' => 'Documento', 'data' => 'documento'],
            ['title' => 'Tipo de contrato ', 'data' => 'tipo_id'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.docentes.datatables'));
        $html->setTableAttribute('id', 'docentes_datatables');

        return view('admin.docentes.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Docente::query())
            ->editColumn('actions', function ($docente) {
                return view('admin.docentes.datatables.actions', compact('docente'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.docentes.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:docentes',
        ]);

        $docente = Docente::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Docente created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Docente $docente)
    {
        return view('admin.docentes.update', compact('docente'));
    }

    public function update(Docente $docente)
    {
        request()->validate([
            'name' => 'required|unique:docentes,name,' . $docente->id,
        ]);

        $docente->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Docente updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Docente $docente)
    {
        $docente->delete();

        return response()->json([
            'flash_now' => ['success', 'Docente deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
