<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    {{-- Fİle select using alexusmai laravel file manager --}}
    <div class="form-group col-md-6">
        @if($label)<label for="image_label">{{ $label }}</label>@endif
        <div class="input-group">
            <input type="text" id="{{ $name }}" class="form-control" name="{{ $name }}" aria-label="Image"
                aria-describedby="button-image" value="{{$value}}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-{{ $name }}">Select</button>
            </div>
        </div>
    </div>

    @push('js')

    <!-- JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
  
      // second button
      document.getElementById('button-{{ $name }}').addEventListener('click', (event) => {
        event.preventDefault();
  
        inputId = '{{ $name }}';
  
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });
    });
  
    // input
    // let inputId = '';
  
    // set file link
    function fmSetLink($url) {
        //remove domain from url
        $url = $url.replace('{{config('app.url')}}/storage/', '');
        document.getElementById(inputId).value = $url;
    }
    </script>
    @endpush
</div>