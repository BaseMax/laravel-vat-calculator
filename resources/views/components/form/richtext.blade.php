<div class="mb-3">
    @isset($label)
        <label class="form-label" for="{{ $attributes['id_editor'] }}">{{ $label }}</label>
    @endisset
    <textarea class="form-control richtext @error($attributes['id_editor']) is-invalid @enderror" {{ $attributes }}
        id="{{ $attributes['id_editor'] . '_editor' }}" name="{{ $name . '_editor' }}">
        {!! $value ?? '' !!}
    </textarea>
    @error($attributes['id_editor'])
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <input id="{{ $attributes['id_editor'] }}" name="{{ $name }}" type="hidden" />
</div>
@prepend('scripts')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#{{ $attributes['id_editor'] . '_editor' }}').summernote();
            var editorId = '#{{ $attributes['id_editor'] . '_editor' }}';
            var hiddenInputId = '#{{ $attributes['id_editor'] }}';

        $(editorId).summernote({
            callbacks: {
                onChange: function(contents, $editable) {
                    $(hiddenInputId).val(contents);
                }
            }
        });

      
        $(hiddenInputId).val($(editorId).summernote('code'));

        $('form').on('submit', function() {
            $(hiddenInputId).val($(editorId).summernote('code'));
        });
        });
    </script>
@endprepend

