@extends('laracrud::layouts.auth')

@section('title', 'Contenidos')
@section('child-content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title') </h2>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-primary" data-modal="{{ route('admin.contenidos.create', $id) }}">
                <i class="fal fa-plus"></i> Crear contenido
            </button>
        </div>
    </div>

    {{-- <div class="card"> --}}
        <div class="panel-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <th>
                        #
                        </th>
                        <th>
                        Instructor
                        </th>
                        <th>
                        Tipo de instructor
                        </th>
                        <th>
                        Competencia
                        </th>

                        <th>
                        Intensidad horaria
                        </th>
                        <th>
                        Opciones
                        </th>
                    </thead>
                    <tbody>

@if(isset($contenidos))
@foreach($contenidos as $contenido)
<tr >
    <td>
        {{$contenido->id}}
    </td>
    <td>
        @if ($contenido->competencia)
            {{$contenido->docente->nombre . $contenido->docente->apellido}}
            @else
            No hay docente asociada
            @endif
        </td>
        <td>
            @if ($contenido->competencia)
            {{$contenido->docente->tipo_id}}
            @else
            indefinido
            @endif
    </td>
    <td>
        @if ($contenido->competencia)
        {{$contenido->competencia->name}}
    @else
        No hay competencia asociada
    @endif
    </td>
    <td>
        {{$contenido->horas}}
    </td>
    <td>
            <div class="text-lg-right text-nowrap">
                <button type="button" class="btn btn-round btn-icon btn-primary" title="Update" data-modal="{{ route('admin.contenidos.update', $contenido->id) }}">
                    <i class="fal fa-fw fa-pencil"></i>
                    </button>

                    {{-- <a href="{{ route('admin.contenidos.show', $contenido->id) }}" class="btn btn-round btn-icon btn-success">
                        <i class="fal fa-fw fa-eye"></i>
                    </a> --}}

                    <form method="POST" action="{{ route('admin.contenidos.delete', $contenido->id) }}" class="d-inline-block" data-ajax-form>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
                            <i class="fal fa-fw fa-trash"></i>
                        </button>
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    </table>


    <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>

</div>
</div>
{{-- <script src="{{ asset('/js/jquery.min.js') }}"></script> --}}
{{-- <script src="{{ asset('/js/datatables.min.js') }}"></script> --}}
{{-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script> --}}

 @section('script')
 $(document).ready( function () {
    $('#table_id').DataTable();
} );

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

{{-- <script type="text/javascript" src="{{ //cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script> --}}

@endsection
