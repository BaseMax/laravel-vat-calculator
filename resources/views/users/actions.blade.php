

<div class="btn-list flex-nowrap">
    <a href="{{ route('users.edit', $model->id) }}" class="btn">
      Edit
    </a>
    <form class="float-end text-nowrap" method="POST" action="{{ route('users.destroy', $model->id) }}"
        onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')
    
        <button type="submit" class="btn">Delete</button>
    </form>
  </div>