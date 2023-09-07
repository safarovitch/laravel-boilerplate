<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">{{ __('settings.title') }}</h1>
    </x-slot>

    <x-slot name="buttons">
        <button id="settingsContentFormSubmit" form="settingsContentForm" class="btn btn-primary">
            <i class="bi bi-save"></i> @lang('action.save')
        </button>
        <button id="addLine" data-popup="setting-editor" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> @lang('action.add')
        </button>
        <a href="{{ route('system.cache.clear') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-clockwise"></i> @lang('system.clear_cache')
        </a>
    </x-slot>


    <div class="row">
        <div class="col-lg-3">
            <!-- Navbar -->
            <div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
                <!-- Navbar Toggle -->
                <!-- Navbar Toggle -->
                <div class="d-grid">
                    <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse"
                        data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false"
                        aria-controls="navbarVerticalNavMenu">
                        <span class="d-flex justify-content-between align-items-center">
                            <span class="text-dark">@lang('menu.menu')</span>

                            <span class="navbar-toggler-default">
                                <i class="bi-list"></i>
                            </span>

                            <span class="navbar-toggler-toggled">
                                <i class="bi-x"></i>
                            </span>
                        </span>
                    </button>
                </div>
                <!-- End Navbar Toggle -->
                <!-- End Navbar Toggle -->

                <!-- Navbar Collapse -->
                <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                    <ul id="navbarSettings"
                        class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical"
                        data-hs-sticky-block-options='{
                     "parentSelector": "#navbarVerticalNavMenu",
                     "targetSelector": "#header",
                     "breakpoint": "lg",
                     "startPoint": "#navbarVerticalNavMenu",
                     "endPoint": "#stickyBlockEndPoint",
                     "stickyOffsetTop": 20
                   }'>
                        @foreach($groupSettings as $group => $data)
                        <li class="nav-item">
                            <a class="nav-link" href="#content-{{$group}}">
                                <i class="bi-sliders nav-icon"></i> @lang('settings.group_' . $group)
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End Navbar Collapse -->
            </div>
            <!-- End Navbar -->
        </div>

        <div class="col-lg-9">
            <div class="d-grid gap-3 gap-lg-5">
                <form id="settingsContentForm" action="{{ route('setting.updateAll') }}" method="POST">
                    @csrf
                    @foreach($groupSettings as $group => $data)
                    <!-- Card -->
                    <div id="content-{{$group}}" class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">@lang('settings.group_'.$group)</h4>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            @foreach ($data as $item)
                            <!-- Form -->
                            <div class="row mb-4">
                                <label for="languageLabel" class="col-sm-3 col-form-label form-label lh-1">@lang('settings.'.$item->key)<br><small class="text-danger">[{{$item->key}}]</small></label>
                                <div class="col-sm-9">
                                    @if($item->type == \App\Enums\InputType::TEXT)
                                    <input type="text" class="form-control" name="{{$item->key}}" value="{{$item->value}}" />
                                    @endif
                                    @if($item->type ==  \App\Enums\InputType::TEXTAREA)
                                    <textarea class="form-control" name="{{$item->key}}" rows="3">{{$item->value}}</textarea>
                                    @endif
                                    @if($item->type ==  \App\Enums\InputType::IMAGE)
                                    <x-file-select name="{{$item->key}}" value="{{$item->value}}"/>
                                    @endif
                                </div>
                            </div>
                            <!-- End Form -->
                            @endforeach

                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                    @endforeach

                </form>
            </div>


            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="setting-editor" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('settings.store') }}" method="POST" data-type="ajax">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">@lang("settings.create.title")</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-group"
                                style="min-width: 100px">@lang('settings.create.group')</span>
                            <input type="text" class="form-control" name="group" list="grouplist">
                            <datalist id="grouplist">
                                @foreach($groupSettings as $group => $data)
                                <option value="{{ $group }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-key"
                                style="min-width: 100px">@lang('settings.create.key')</span>
                            <input type="text" class="form-control" name="key">
                        </div>
                        <div class="input-group input-group-sm mb-2 tom-select-custom">
                            <span class="input-group-text px-2" id="addon-type"
                                style="min-width: 100px">@lang('settings.create.type')</span>
                            <select class="js-select form-select tomselected" name="type">
                                <option value=""></option>
                                @foreach (\App\Enums\InputType::getValues() as $type )
                                <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-value"
                                style="min-width: 100px">@lang('settings.create.value')</span>
                            <input type="text" class="form-control" name="value">
                        </div>

                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-value"
                                style="min-width: 100px">@lang('settings.create.options')</span>
                            <input type="text" class="form-control" name="options">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white"
                            data-bs-dismiss="modal">@lang('modal.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('modal.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- End Row -->
    @push('js')


    
    <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                
            $(document).delegate('[data-popup]', 'click', function(){
                var popup = $(this).data('popup');
                var id = $(this).data('id');
                var content = $(this).data('content');
                var title = $(this).data('title');
                var $modal = $('#' + popup);

                $modal.find('.modal-title').text(title);
                $modal.modal('show');
            });

            $('form[data-type="ajax"]').submit(function(e){
                e.preventDefault();
                var $form = $(this);

                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: $form.serialize(),
                    success: function(response){
                        $('#setting-editor').modal('hide');
                        location.reload();
                    }
                });
            });
    </script>
    @endpush
</x-app-layout>
@prepend('js')