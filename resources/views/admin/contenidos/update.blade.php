@extends('laracrud::layouts.modal')

@section('title', 'Update Contenido')
@section('content')
    <script>
            console.log( @php
            echo $contenido[0]->docente->id;
            @endphp
            );
    </script>
    <form method="POST" action="{{ route('admin.contenidos.update',$contenido[0]->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <select name="docente_id" class="browser-default custom-select form-control">
                    <option selected  value="{{$contenido[0]->docente->id}}"> {{$contenido[0]->docente->name}} {{$contenido[0]->docente->apellido}}</option>
                    @foreach ($docentes as $item)
                    <option value="{{$item->id}}"> {{$item->name}} {{$item->apellido}}  </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <select name="competencia_id" class="browser-default custom-select form-control">
                        <option value="{{$contenido[0]->competencia->id}}">{{$contenido[0]->competencia->name}} </option>
                        @foreach ($competencias as $item)
                        <option value="{{$item->id}}">  {{$item->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-body">
                    <div class="form-group">
                        <label for="horas">Intensidad horaria</label>
                        <input class="form-control" type="text" name="horas" value="{{old('horas', $contenido[0]->horas)}}">
                    </div>
                </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
