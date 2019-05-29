@extends('laracrud::layouts.modal')

@section('title', 'Create Contenido')
@section('content')
    <form method="POST" action="{{ route('admin.contenidos.create',$id) }}" data-ajax-form>
        @csrf
        <div class="modal-body">

                <div class="form-group">
                        <label for="Docente" class="label label-control">Docente</label>
                        <select class="browser-default custom-select form-control" name="docente_id">
                            @foreach ($docentes as $docente)
                            <option  value="{{$docente->id}}">{{$docente->name}}  {{$docente->apellido}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                        <label for="Competencia" class="label label-control">Competencia</label>
                        <select class="browser-default custom-select form-control" name="competencia_id">
                                @foreach ($competencias as $competencia)
                                <option value="{{$competencia->id}}">{{$competencia->name}}  </option>
                                @endforeach
                        </select>
                </div>

                 <div class="form-group">
                        <label for="Intensidad horaria semanal ">Intensidad horaria semanal </label>
                        <input type="number" name="horas" id="horas" class="form-control" value="{{ old('horas') }}">
                 </div>

                   <input type="hidden" name="ficha_id" id="" value="{{$id}}">
             </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
