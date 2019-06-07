@extends('laracrud::layouts.auth')

@section('title', 'Secions')
@section('child-content')
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-primary" data-modal="{{ route('admin.secions.create', $id) }}">
                <i class="fal fa-plus"></i> Create Secion
            </button>
        </div>
    </div>
    {{-- ['title' => 'Nombre Docente' , 'data' => 'docente.name' ], --}}

    <div class="card">
        <div class="card-body">
            @if(isset($html))
            {!! $html->table(['class' => 'table bg-light text-dark display dataTable_width_auto'], true)!!}
            @endif
        </div>
    </div>
@endsection

@push('scripts')

@if(isset($html))
{!! $html->scripts()!!}
@endif
@endpush
