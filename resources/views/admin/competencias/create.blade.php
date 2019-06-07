@extends('laracrud::layouts.modal')

@section('title', 'Create Competencia')
@section('content')
    <form method="POST" action="{{ route('admin.competencias.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                    <label for="descripcion">Resultado de aprendizaje</label>
                    <textarea type="text" name="description" id="descripcion" class="form-control" value="{{ old('description') }}"></textarea>
             </div>


        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
