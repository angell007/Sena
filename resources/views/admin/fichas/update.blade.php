@extends('laracrud::layouts.modal')

@section('title', 'Update Ficha')
@section('content')
    <form method="POST" action="{{ route('admin.fichas.update', $ficha->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $ficha->name) }}">
            </div>

            <div class="form-group">
                <label for="numero">#Numero de ficha</label>
                <input type="text" name="ref" id="ref" class="form-control" value="{{ old('ref',  $ficha->ref) }}">
            </div>


                <div class="form-group">
                    <label for="modalidad" class="label label-control">Modalidad</label>
                    <select class="browser-default custom-select form-control" name="modalidad_id">
                        <option selected  disabled value="{{ $ficha->modalidad_id}}"> {{ $ficha->modalidad_id}} </option>
                        <option value="Tecnica" > Tecnica </option>
                        <option value="Tecnologica">Tecnologica</option>
                        <option value="Especializacion Tecnologica">Especializacion tecnologica</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Jornada" class="label label-control">Jornada</label>
                    <select class="browser-default custom-select form-control" name="jornada">
                        <option selected  disabled value="{{ $ficha->jornada}}"> {{ $ficha->jornada}} </option>
                        <option value="mañana" > Mañana </option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Trimestre Formacion" class="label label-control">Trimestre Formacion</label>
                    <select class="browser-default custom-select form-control" name="trimestre_formacion">
                        <option selected  disabled value="{{ $ficha->trimestre_formacion}}"> {{ $ficha->trimestre_formacion}} </option>
                        <option value="I" > I </option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Intensidad Horaria Total">Intensidad Horaria Total</label>
                    <input type="number" name="horas" id="horas" class="form-control" value="{{ old('horas', $ficha->horas) }}">
                </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>

    </form>
@endsection
