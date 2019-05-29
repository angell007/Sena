<div class="text-lg-right text-nowrap">
    <button type="button" class="btn btn-round btn-icon btn-primary" title="Update" data-modal="{{ route('admin.fichas.update', $ficha->id) }}">
        <i class="fal fa-fw fa-pencil"></i>
    </button>

    <a href="{{ route('admin.fichas.show', $ficha->id) }}" class="btn btn-round btn-icon btn-success">
        <i class="fal fa-fw fa-eye"></i>
    </a>

    <form method="POST" action="{{ route('admin.fichas.delete', $ficha->id) }}" class="d-inline-block" data-ajax-form>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
            <i class="fal fa-fw fa-trash"></i>
        </button>
    </form>
</div>
