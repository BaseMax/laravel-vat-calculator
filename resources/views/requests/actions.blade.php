<div class="btn-list flex-nowrap">
    <a onclick="fill_model({{ $model->id }})" class="btn" data-bs-toggle="modal" data-bs-target="#modal-report-show">
        Show
    </a>
    <form class="float-end text-nowrap" method="POST" action="{{ route('requests.destroy', $model->id) }}"
        onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn">Delete</button>
    </form>
</div>
