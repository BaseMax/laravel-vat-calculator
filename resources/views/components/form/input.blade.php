<div class="mb-3">
    @if ($label)
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type ?? 'text' }}"
        value="{{ $value ?? old($name, '') }}" class="form-control @error($name) is-invalid @enderror {{ $attributes == 'select-2-js' ?  'select-2-js' : '' }}"
        {{ $attributes }} />

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select-2-js').select2();
        });
    </script>
@endpush
