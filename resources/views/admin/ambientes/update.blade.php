@extends('laracrud::layouts.modal')

@section('title', 'Update Ambiente')
@section('content')
    <form method="POST" action="{{ route('admin.ambientes.update', $ambiente->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $ambiente->name) }}">
            </div>

            <div class="form-group">
                    <label for="numero">numero</label>
                    <input type="text" name="numero" id="numero" class="form-control" value="{{ old('numero', $ambiente->numero) }}">
                </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
