<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('attribute.title')</h1>
	</x-slot>
	<form action="@isset($attribute){{route('attribute.update', $attribute)}}@else{{route('attribute.store')}}@endisset" method="POST" data-type="ajax">
		@isset($attribute)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-12 col-lg-5 mb-3 mb-lg-0">
				<!-- Card -->
				<div class="card mb-3 mb-lg-5">
					@if(count(config('app.site_locales'))>1)
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							@foreach (config('app.site_locales') as $code => $locale)
							<button class="nav-link @if($loop->index == 0) active @endif" id="nav-tab-{{$code}}"
								data-bs-toggle="tab" data-bs-target="#nav-{{$code}}" type="button" role="tab"
								aria-controls="nav-{{$code}}" aria-selected="true"><span class="d-flex"><img
										src="{{asset($locale['flag'])}}" width="14" class="mr-2">
									{{$locale['label']}}</span></button>
							@endforeach
						</div>
					</nav>
					@endif
					<div class="tab-content" id="nav-tabContent">
						@foreach (config('app.site_locales') as $code => $locale)
						<div class="tab-pane fade @if($loop->index == 0) active show @endif" id="nav-{{$code}}"
							role="tabpanel" aria-labelledby="nav-tab-{{$code}}">
							<!-- Header -->
							<div class="card-header">
								<h4 class="card-header-title">@lang('attribute.content')</h4>
							</div>
							<!-- End Header -->
							<!-- Body -->
							<div class="card-body">
								<!-- Form -->
								<div class="mb-4">
									<label for="title" class="form-label">@lang('attribute.name')</label>
									<input type="text" class="form-control" name="name[{{$code}}]" id="name"
										autocomplete="text"
										value="{{old('name.'.$code, isset($attribute) ? $attribute->getTranslation('name', $code) : null )}}">
								</div>
								<!-- End Form -->
							</div>
							<!-- Body -->
						</div>
						@endforeach
					</div>
				</div>
				<!-- End Card -->
				<!-- End Col -->
				<div class="card mb-5">
					<div class="card-body">
						<!-- Form -->
						<div class="mb-4">
							<label for="type" class="form-label">@lang("attribute.type")</label>
							<!-- Select -->
							<div class="tom-select-custom">
								<select class="js-select form-select" name="type" data-hassubitems="" data-has-component=""
									data-subitemholder="holder">
									<option value="">@lang("options.select")</option>
									@foreach (App\Enums\InputType::getValues() as $type)
									@if ($type == App\Enums\InputType::SELECT || $type == App\Enums\InputType::TEXT)
									<option value="{{$type}}" @if(old('type', $attribute->type ?? null) == $type)
										selected @endif>{{$type}}</option>
									@endif
									@endforeach
								</select>
							</div>
							<!-- End Select -->
						</div>
					</div>
					<!-- Body -->
				</div>
				<!-- End Card -->
			</div>

			<div class="col">
				<div class="card">

					<div class="card-header">
						<h4 class="card-header-title">@lang('attribute.options')</h4>
					</div>
					<div class="card-body">
						<div data-component-parent="{{ \App\Enums\InputType::SELECT }}">
						<div id="holder">

						</div>
						</div>
						<div data-component-parent="{{ \App\Enums\InputType::TEXT }}">
							<p>This option will allow you to enter text on product details page</p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
			<div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3"
			style="max-width: 40rem;">
			<!-- Card -->
			<div class="card card-sm bg-dark border-dark mx-2">
				<div class="card-body">
					<div class="row justify-content-center justify-content-sm-between">
						<div class="col">
							<button type="button" class="btn btn-ghost-danger">@lang('action.delete')</button>
						</div>
						<!-- End Col -->
						<div class="col-auto">
							<div class="d-flex gap-3">
								<button type="button"
									class="btn btn-ghost-light">@lang('action.discard')</button>
								<button type="submit" class="btn btn-primary">@lang('action.save')</button>
							</div>
						</div>
						<!-- End Col -->
					</div>
					<!-- End Row -->
				</div>
			</div>
			<!-- End Card -->
		</div>
	</form>
	<!-- End Content -->
</x-app-layout>

@csrf

@section('js')
<script src="{{ asset('/vendor/formrepeater/formrepeater.bundle.js')}}"></script>
<script>
	$(document).ready(function(){
		HSCore.components.HSTomSelect.init('.js-select')
	});
</script>
<script>
	$(document).ready(function(){
	  // INITIALIZATION OF ADD FIELD
	  // =======================================================
	  new HSAddField('.js-add-field')
	});
</script>

<script>
	$(document).ready(function() {
		$(document).delegate('[data-has-component]', 'change', function() {
			var val = $(this).val();
			$('[data-component-parent]').hide();
			$('[data-component-parent]').find('input textarea select').attr('disabled', 'disabled');
			$('[data-component-parent="' + val + '"]').show();
			$('[data-component-parent="' + val + '"]').removeAttr('disabled');
		});

        $('[data-hassubitems]').on('change', function() {
            let holder = '#' + $(this).data('subitemholder');
            // Activate indicator
            $(holder + '-indicator').attr("data-kt-indicator", "on");
            let token = $('input[name="_token"]').val();

            $(holder).empty();

            $(holder).load("{{ route('attribute.option.template.load') }}", {
                _token: token,
                type: $(this).val(),
                attribute : '{{$attribute->id ?? null}}'
            }, function() {
                // Activate indicator
                $(holder + '-indicator').attr("data-kt-indicator", "off");
                // $('[data-repeater-item]').find('[data-control="select2"]').select2();
            });
        });

        @if( old('type', $attribute->type ?? null) != null)
        $('[data-hassubitems]').trigger('change');
        @endif
    });
</script>
@prepend('js')
@endsection