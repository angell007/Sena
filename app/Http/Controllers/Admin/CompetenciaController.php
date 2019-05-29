<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Competencia;

class CompetenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombre', 'data' => 'name'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.competencias.datatables'));
        $html->setTableAttribute('id', 'competencias_datatables');

        return view('admin.competencias.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Competencia::query())
            ->editColumn('actions', function ($competencia) {
                return view('admin.competencias.datatables.actions', compact('competencia'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.competencias.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:competencias',
        ]);

        $competencia = Competencia::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Competencia created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Competencia $competencia)
    {
        return view('admin.competencias.update', compact('competencia'));
    }

    public function update(Competencia $competencia)
    {
        request()->validate([
            'name' => 'required|unique:competencias,name,' . $competencia->id,
        ]);

        $competencia->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Competencia updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Competencia $competencia)
    {
        $competencia->delete();

        return response()->json([
            'flash_now' => ['success', 'Competencia deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
