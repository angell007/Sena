@extends('laracrud::layouts.auth')

@section('title', 'Docentes')
@section('child-content')
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-primary" data-modal="{{ route('admin.docentes.create') }}">
                <i class="fal fa-plus"></i> Create Docente
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
                       {!! $html->table(['class' => 'table bg-light text-dark display dataTable_width_auto'], true)!!}

        </div>
    </div>
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush
