@extends('laracrud::layouts.modal')

@section('title', 'Registrar Ficha')
@section('content')
    <form method="POST" action="{{ route('admin.fichas.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>


                <div class="form-group">
                    <label for="modalidad" class="label label-control">Modalidad</label>
                    <select class="browser-default custom-select form-control" name="modalidad_id">
                        <option selected  value="Tecnica" > Tecnica </option>
                        <option value="Tecnologica">Tecnologica</option>
                        <option value="Especializacion Tecnologica">Especializacion tecnologica</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Jornada" class="label label-control">Jornada</label>
                    <select class="browser-default custom-select form-control" name="jornada">
                        <option selected  value="mañana" > Mañana </option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Trimestre Formacion" class="label label-control">Trimestre Formacion</label>
                    <select class="browser-default custom-select form-control" name="trimestre_formacion">
                        <option selected  value="I" > I </option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Intensidad Horaria Total">Intensidad Horaria Total</label>
                    <input type="number" name="horas" id="horas" class="form-control" value="{{ old('horas') }}">
                </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
