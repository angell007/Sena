@can('Admin')
    {{-- <div class="bg-primary"> --}}
    <li class="nav-item{!! request()->is('admin/disponibilidads') ? ' active' : '' !!}">
        <a href="{{ route('admin.disponibilidads') }}" class="nav-link text-light">Disponibilidads</a>
    </li>
    <li class="nav-item{!! request()->is('admin/disponibilidad text-light') ? ' active' : '' !!}">
        <a href="{{ url('importExport') }}" class="nav-link text-light">Importar</a>
    </li>
    {{-- <li class="nav-item{!! request()->is('admin/horarios') ? ' active' : '' !!}">
        <a href="{{ route('admin.horarios') }}" class="nav-link">Horarios</a>
    </li>
    <li class="nav-item{!! request()->is('admin/contenidos') ? ' active' : '' !!}">
        <a href="{{ route('admin.contenidos') }}" class="nav-link">Contenidos</a>
    </li> --}}
    <li class="nav-item{!! request()->is('admin/docentes') ? ' active' : '' !!}">
        <a href="{{ route('admin.docentes') }}" class="nav-link text-light">Docentes</a>
    </li>
    <li class="nav-item{!! request()->is('admin/fichas') ? ' active' : '' !!}">
        <a href="{{ route('admin.fichas') }}" class="nav-link text-light">Fichas</a>
    </li>
    <li class="nav-item{!! request()->is('admin/competencias') ? ' active' : '' !!}">
        <a href="{{ route('admin.competencias') }}" class="nav-link text-light">Competencias</a>
    </li>
    <li class="nav-item{!! request()->is('admin/ambientes') ? ' active' : '' !!}">
        <a href="{{ route('admin.ambientes') }}" class="nav-link text-light">Ambientes</a>
    </li>
    <li class="nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
        <a href="{{ route('admin.users') }}" class="nav-link text-light">Users</a>
    </li>
{{-- </div> --}}
@endcan

