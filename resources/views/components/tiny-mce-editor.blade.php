<div>
    @php $id = str_replace("]", "", str_replace("[", "-", $name)) @endphp
    @push('js')
    <script src="https://cdn.tiny.cloud/1/weybhvk6lg5oqp7ba431cqzvxqb7pds0t77yh5gqt816d0zr/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        function initTiny(id) {
            tinymce.init({
                selector: '#editor-'+id,
                toolbar_mode: 'floating',
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak image link media',
                language: '{{app()->getLocale()}}',
                skin: ((localStorage.getItem('hs_theme') == 'dark' || (localStorage.getItem('hs_theme') == 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) ) ? "oxide-dark" : "oxide"),
                content_css: ((localStorage.getItem('hs_theme') == 'dark' || (localStorage.getItem('hs_theme') == 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) ) ? "dark" : "light"),
                toolbar: [
                    {
                        name: 'history', items: [ 'undo', 'redo' ]
                    },
                    {
                        name: 'styles', items: [ 'styleselect' ]
                    },
                    {
                        name: 'formatting', items: [ 'bold', 'italic']
                    },
                    {
                        name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ]
                    },
                    {
                        name: 'indentation', items: [ 'outdent', 'indent' ]
                    },
                    {
                        name: 'file', items: [ 'image', 'link' ]
                    }
                ],
                branding: false
            });
        }

        $(document).ready(function(){
            initTiny('{{$id}}');
        });
        var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
        tabEl.addEventListener('shown.bs.tab', function (event) {
            initTiny('{{$id}}');
        });
    </script>
    @endpush
    <textarea id="editor-{{$id}}" name="{{$name}}">{!!$value!!}</textarea>
</div>