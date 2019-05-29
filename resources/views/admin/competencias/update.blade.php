@extends('laracrud::layouts.modal')

@section('title', 'Update Competencia')
@section('content')
    <form method="POST" action="{{ route('admin.competencias.update', $competencia->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $competencia->name) }}">
            </div>
            <div class="form-group">
                    <label for="Descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $competencia->descripcion) }}">
                </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
