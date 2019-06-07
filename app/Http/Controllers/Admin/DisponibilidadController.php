<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Disponibilidad;

class DisponibilidadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Dia', 'data' => 'dia'],
            ['title' => 'Hora de Inicial', 'data' => 'hora_inicio'],
            ['title' => 'Meridiano', 'data' => 'him'],
            ['title' => 'Hora de Finalizacion ', 'data' => 'hora_fin'],
            ['title' => 'Meridiano', 'data' => 'hfm'],
            ['title' => 'Jornada', 'data' => 'jornada'],
            ['title' => 'Ambiente', 'data' => 'ambiente.numero'],
            // ['title' => 'Secion', 'data' => 'secion.ficha'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.disponibilidads.datatables'));
        $html->setTableAttribute('id', 'disponibilidads_datatables');

        return view('admin.disponibilidads.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Disponibilidad::with('ambiente','secion'))
            ->editColumn('actions', function ($disponibilidad) {
                return view('admin.disponibilidads.datatables.actions', compact('disponibilidad'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.disponibilidads.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:disponibilidads',
        ]);

        $disponibilidad = Disponibilidad::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Disponibilidad created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Disponibilidad $disponibilidad)
    {
        return view('admin.disponibilidads.update', compact('disponibilidad'));
    }

    public function update(Disponibilidad $disponibilidad)
    {
        request()->validate([
            'name' => 'required|unique:disponibilidads,name,' . $disponibilidad->id,
        ]);

        $disponibilidad->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Disponibilidad updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();

        return response()->json([
            'flash_now' => ['success', 'Disponibilidad deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
