@section('css')
<style>

</style>
@prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('variation.title')</h1>
	</x-slot>
	<form action="@isset($variation){{route('variation.update', $variation)}}@else{{route('variation.store')}}@endisset"
		method="POST" data-type="ajax">
		@isset($variation)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-lg-5 mb-3 mb-lg-0">
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
								<h4 class="card-header-title">@lang('variation.content')</h4>
							</div>
							<!-- End Header -->
							<!-- Body -->
							<div class="card-body">
								<!-- Form -->
								<div class="mb-4">
									<label for="title" class="form-label">@lang('variation.name')</label>
									<input type="text" class="form-control" name="name[{{$code}}]" id="name"
										autocomplete="text"
										value="{{old('name.'.$code, isset($variation) ? $variation->getTranslation('name', $code) : null )}}">
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
							<label for="type" class="form-label">@lang("variation.type")</label>
							<!-- Select -->
							<div class="tom-select-custom">
								<select class="js-select form-select" name="type" data-hassubitems=""
									data-subitemholder="holder">
									<option value="">@lang("options.select")</option>
									@foreach (App\Enums\InputType::getValues() as $type)
									@if ($type == App\Enums\InputType::SELECT || $type == App\Enums\InputType::CHECKBOX
									|| $type == App\Enums\InputType::RADIO)
									<option value="{{$type}}" @if(old('type', $variation->type ?? null) == $type)
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
						<h4 class="card-header-title">@lang('varition.options')</h4>
					</div>
					<div class="card-body">
						<h6 class="text-cap">@lang('variations.action.add-option')</h6>
						<div id="holder">

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
		</div>
	</form>
	<!-- End Content -->
</x-app-layout>

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
        $('[data-hassubitems]').on('change', function() {
            let holder = '#' + $(this).data('subitemholder');
            // Activate indicator
            $(holder + '-indicator').attr("data-kt-indicator", "on");
            let token = $('input[name="_token"]').val();

            $(holder).empty();

            $(holder).load("{{ route('variation.option.template.load') }}", {
                _token: token,
                type: $(this).val(),
                variation : '{{$variation->id ?? null}}'
            }, function() {
                // Activate indicator
                $(holder + '-indicator').attr("data-kt-indicator", "off");
                // $('[data-repeater-item]').find('[data-control="select2"]').select2();
            });
        });

        @if( old('type', $variation->type ?? null) != null)
        $('[data-hassubitems]').trigger('change');
        @endif
    });
</script>
@prepend('js')
@endsection