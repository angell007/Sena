<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Horario;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {

        // $horarios = Horario::where('ficha_id',$id)->with('docente','competencia','ficha')->get();
        // return view('horario.index', compact('horarios','id'));

        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.horarios.datatables'));
        $html->setTableAttribute('id', 'horarios_datatables');

        return view('admin.horarios.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Horario::query())
            ->editColumn('actions', function ($horario) {
                return view('admin.horarios.datatables.actions', compact('horario'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        // $f = Ficha::findOrfail($id);
        // $id = $f->id;
        // $docentes = Docente::all();
        // $competencias = Competencia::all();
        // return view('horario.create', compact('id','docentes','competencias'));

        return view('admin.horarios.create');
    }

    public function create()
    {
        // $horario = Horario::create(request()->all());
        // $id = $horario->ficha_id;
        // return redirect()->route('horario', $id);

        request()->validate([
            'name' => 'required|unique:horarios',
        ]);

        $horario = Horario::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Horario created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Horario $horario)
    {
        return view('admin.horarios.update', compact('horario'));
    }

    public function update(Horario $horario)
    {
        request()->validate([
            'name' => 'required|unique:horarios,name,' . $horario->id,
        ]);

        $horario->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Horario updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Horario $horario)
    {

        // try {
        //     $horario = Horario::findOrFail($id);
        //     $horario->delete();
        //     return back()->with('success_msg',' Exito ');
        // } catch (\Throwable $th) {
        //     return back()->with('warning_msg','Error en modos '. $th->getMessage());
        // }

        $horario->delete();

        return response()->json([
            'flash_now' => ['success', 'Horario deleted!'],
            'reload_datatables' => true,
        ]);

   }
}
