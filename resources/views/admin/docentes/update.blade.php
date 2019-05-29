@extends('laracrud::layouts.modal')

@section('title', 'Update Docente')
@section('content')
    <form method="POST" action="{{ route('admin.docentes.update', $docente->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

            <div class="modal-body">
            <div class="form-group">
            <label for="Documento">Documento</label>
            <input type="number" name="documento" id="documento" class="form-control" value={{ old('documento', $docente->documento) }}>
            </div>

            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $docente->name) }}">
            </div>

            <div class="form-group">
            <label for="Apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $docente->apellido) }}">
            </div>

            <div class="form-group">
            <label for="Tipo de contrato">Tipo de contrato</label>
                    <select class="browser-default custom-select form-control" name="tipo_id">
                        <option value="{{ old('apellido', $docente->tipo_id) }}"></option>
                        <option selected  value="Planta" > Planta </option>
                        <option value="Provisional">Provisional</option>
                        <option value="Contratista">Contratista</option>
                    </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
