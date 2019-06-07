<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Secion;
use App\Ficha;
use App\Docente;
use App\Competencia;
use App\Ambiente;
use App\Contenido;
use App\Disponibilidad;
use DB;

class SecionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index($id)
    {
        if (Ficha::count()==0){
            return abort(403);
        }else{
            $html = app('datatables.html')->columns([
                ['title' => 'Dia' , 'data' =>  'dia','orderable' => true,],
                ['title' => 'Jornada' , 'data' =>  'jornada','orderable' => true,],
                // ['title' => 'Docente' , 'data' => 'docente.documento','orderable' => false,],
                ['title' => 'Apellido de Docente' , 'data' =>  'docente.apellido','orderable' => false,],
                ['title' => 'Competencia ' , 'data' => 'competencia.name','orderable' => false,],
                ['title' => 'Ambiente' , 'data' =>  'ambiente.name','orderable' => false,],
                ['title' => 'Ficha ' , 'data' => 'ficha.name','orderable' => false,],
                ['title' => 'Hora Inicio' , 'data' =>  'hora_inicio','orderable' => false,],
                // ['title' => 'Am/Pm', 'data' => 'him'],
                ['title' => 'Hora Fin' , 'data' =>  'hora_fin','orderable' => false,],
                // ['title' => 'Am/Pm', 'data' => 'hfm'],



                ['title' => 'opcion', 'data' => 'actions', 'searchable' => false,
                'orderable' => false,
                // 'render' => "function () {
                //     return ();
                // }",
                // 'footer' => 'Id',
                'exportable' => true,
                'printable' => true,
                ]
                ])
                // ->addColumn('action', 'path.to.view')
                ->parameters([
                    'dom' => 'Bfrtip',
                    // 'scrollX' => true,
                    'autoWidth' => true,
                    'buttons' => [
                        'create', 'csv', 'excel', 'pdf', 'print'],
                ]);

                $html->ajax(route('admin.secions.datatables', $id));
                $html->setTableAttribute('id', 'secions_datatables');

                return view('admin.secions.index', compact('html','id'));
            }
        }

    public function datatables($id)
    {
        $datatables = datatables(Secion::with('docente', 'competencia', 'ambiente', 'ficha')->where('ficha_id',$id))
            ->editColumn('actions', function ($secion) {
                return view('admin.secions.datatables.actions', compact('secion'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal($id)
    {
        // $docentes = Contenido::with('docente')
        // ->where('ficha_id', $id)
        // ->get();

        $competencias=array();
        $identificadores = Contenido::where('ficha_id',$id)
        ->distinct('competencia_id')
        ->pluck('competencia_id');
        foreach ($identificadores as $identificador) {
           $competencia = Competencia::where('id', $identificador)->select('name','id')->get();
           array_push( $competencias , $competencia);
        }

        $docentes=array();
        $identificadores = Contenido::where('ficha_id',$id)
        ->distinct('docente_id')
        ->pluck('docente_id');
        foreach ($identificadores as $identificador) {
           $docente = Docente::where('id', $identificador)->select('name','apellido','id')->get();
           array_push( $docentes , $docente);
        }


        $ambientes = Ambiente::select('numero','id')->get();

        return view('admin.secions.create', compact('docentes','competencias','id','ambientes'));
    }


            // Docente::where('id', $aux->docente_id)->get();
            // $docentes = Docente::all()->where('id',$aux)->get();
            // $competencias = Competencia::pluck('id','name');
            // $ficha = $id;


    public function create()
    {
        DB::beginTransaction();
        try {
            $secion = new Secion;
            $secion->docente_id = request()->docente_id ;
            $secion->competencia_id = request()->competencia_id ;
            $secion->ambiente_id = request()->ambiente_id ;
            $secion->ficha_id = request()->ficha_id ;
            $secion->hora_inicio= request()->hora_inicio;
            $secion->hora_fin= request()->hora_fin;
            $secion->him= request()->him;
            $secion->hfm= request()->hfm;
            $secion->jornada= request()->jornada;
            $secion->dia= request()->dia;
            $secion -> saveOrFail();
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
            return response()->json([
                'flash_now' => ['danger',  $e],
                'dismiss_modal' => true,
                'reload_datatables' => true,
            ]);
        }

        if ($success) {
            DB::beginTransaction();
            try {
                $disponilidad = new Disponibilidad;
                $disponilidad->name = '';
                $disponilidad->dia= request()->dia;
                $disponilidad->hora_inicio= request()->hora_inicio;
                $disponilidad->hora_fin= request()->hora_fin;
                $disponilidad->him= request()->him;
                $disponilidad->hfm= request()->hfm;
                $disponilidad->jornada= request()->jornada;
                $disponilidad->ambiente_id= request()->ambiente_id;
                $disponilidad->secion_id= $secion->id;
                $disponilidad -> saveOrFail();
                DB::commit();
                return response()->json([
                    'flash_now' => ['success', 'Secion created!'],
                    'dismiss_modal' => true,
                    'reload_datatables' => true,
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'flash_now' => ['danger',  $e],
                    'dismiss_modal' => true,
                    'reload_datatables' => true,
                ]);
            }
        }
    }

    public function updateModal(Secion $secion)
    {
        return view('admin.secions.update', compact('secion'));
    }

    public function update(Secion $secion)
    {
        request()->validate([
            // 'name' => 'required|unique:secions,name,' . $secion->id,
        ]);
        $updateRows = Disponibilidad::where('secion_id', $secion->id);

                $updateRows->name = '';
                $updateRows->dia= request()->dia;
                $updateRows->hora_inicio= request()->hora_inicio;
                $updateRows->hora_fin= request()->hora_fin;
                $updateRows->him= request()->him;
                $updateRows->hfm= request()->hfm;
                $updateRows->jornada= request()->jornada;
                $updateRows->ambiente_id= request()->ambiente_id;
                $updateRows->secion_id= $secion->id;
                $updateRows -> save();

        $secion->update(request()->all());
        return response()->json([
            'flash_now' => ['success', 'Secion updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Secion $secion)
    {
        $deletedRows = Disponibilidad::where('secion_id', $secion->id)->delete();
        $secion->delete();
        return response()->json([
            'flash_now' => ['success', 'Secion deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
