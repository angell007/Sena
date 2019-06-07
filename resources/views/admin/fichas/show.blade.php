@extends('laracrud::layouts.auth')

@section('title', 'Contenidos')
@section('child-content')
<div class="row align-items-center mb-3">
    <div class="col-lg">
        <h2 class="mb-2 mb-lg-0">@yield('title') </h2>
    </div>
    <div class="col-lg-auto">
        <button type="button" class="btn btn-round btn-primary"
            data-modal="{{ route('admin.contenidos.create', $id) }}">
            <i class="fal fa-plus"></i> Crear contenido
        </button>
        @if(count($contenidos)>0)
        <a class="btn btn-round btn-success" href="{{ route('admin.secions',$id) }}">
            <i class="fal fa-eye"></i> Horario
        </a>
        @endif
    </div>
</div>
{{-- <div class="card"> --}}
<div class="panel-body">
    <table class="table table-bordered" id="contenidos">
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
            <tr>
                <td>
                    {{$contenido->id}}
                </td>
                <td>
                    @if ($contenido->competencia)
                    {{$contenido->docente->name .' '. $contenido->docente->apellido}}
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
                        <button type="button" class="btn btn-round btn-icon btn-primary" title="Update"
                            data-modal="{{ route('admin.contenidos.update', $contenido->id) }}">
                            <i class="fal fa-fw fa-pencil"></i>
                        </button>

                        {{-- <a href="{{ route('admin.contenidos.show', $contenido->id) }}" class="btn btn-round
                        btn-icon btn-success">
                        <i class="fal fa-fw fa-eye"></i>
                        </a> --}}

                        <form method="POST" action="{{ route('admin.contenidos.delete', $contenido->id) }}"
                            class="d-inline-block" data-ajax-form>
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
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function () {
        $('#contenidos').DataTable();
    });
</script>
@endsection
