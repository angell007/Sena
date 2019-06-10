@extends('laracrud::layouts.auth')

@section('title', 'Importar datos')
@section('child-content')
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
        </div>
        <div class="col-lg-auto">
            {{--  <button type="button" class="btn btn-round btn-primary" data-modal="{{ route('admin.ambientes.create') }}">
                <i class="fal fa-plus"></i> Create Ambiente
            </button>  --}}
        </div>
    </div>

    <div class="card">
        <div class="card-body">

        <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
        <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
        <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>

        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <input type="file" name="import_file" />
            <button class="btn btn-primary">Import File</button>
        </form>
    </div>
</div>
@endsection

