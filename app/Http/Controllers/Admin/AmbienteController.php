<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ambiente;

class AmbienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Nombre', 'data' => 'name'],
            ['title' => 'Numero', 'data' => 'numero'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.ambientes.datatables'));
        $html->setTableAttribute('id', 'ambientes_datatables');

        return view('admin.ambientes.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Ambiente::query())
            ->editColumn('actions', function ($ambiente) {
                return view('admin.ambientes.datatables.actions', compact('ambiente'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.ambientes.create');
    }

    public function create()
    {
        // request()->validate([
        //     'name' => 'required|unique:ambientes',
        // ]);

        $ambiente = Ambiente::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Ambiente created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Ambiente $ambiente)
    {
        return view('admin.ambientes.update', compact('ambiente'));
    }

    public function update(Ambiente $ambiente)
    {
        request()->validate([
            'name' => 'required|unique:ambientes,name,' . $ambiente->id,
        ]);

        $ambiente->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Ambiente updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Ambiente $ambiente)
    {
        $ambiente->delete();

        return response()->json([
            'flash_now' => ['success', 'Ambiente deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
