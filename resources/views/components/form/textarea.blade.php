<div class="mb-3">
    @if($label)
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    <textarea id="{{ $name }}" name="{{ $name }}" type="{{ $type ?? 'text' }}"
           class="form-control @error($name) is-invalid @enderror" {{ $attributes }} >{{ $value ?? old($name, '') }}</textarea>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
