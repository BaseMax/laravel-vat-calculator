<div class="mb-3">
    @isset($label)
        <label class="form-label" for="{{ $attributes['id'] }}">{{ $label }} @isset($isRequired)
                <span class="text-danger">*</span>
            @endisset
        </label>
    @endisset

    <input class="form-control mb-2 @error($attributes['id']) is-invalid @enderror" placeholder="Select a date"
        id="{{ $attributes['id'] . '_datepicker' }}" name="{{ $name }}" {{ $attributes }}>

    @error($attributes['id'])
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/litepicker/2.0.12/litepicker.js" integrity="sha512-ZbnsrTCJAJWynwgi3ndt7jcjwrJfHNzUh/mZakBRhZG8lYgMVtZLxY2CG4GuONoER9E8iiuupt4fnrNfXy+aGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.Litepicker && (new Litepicker({
                element: document.getElementById("{{ $attributes['id'] . '_datepicker' }}"),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));
        });
    </script>
@endpush