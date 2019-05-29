@can('Admin')
    <li class="nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
        <a href="{{ route('admin.users') }}" class="nav-link text-dark">Users</a>
    </li>
@endcan

