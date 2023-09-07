@section('css')
@prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('blog.title')</h1>
	</x-slot>
	<form action="@isset($post){{route('post.update', $post)}}@else{{route('post.store')}}@endisset" method="POST">
		@isset($post)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-lg-3">
				<!-- Card -->
				<div class="card mb-5">
					<!-- Header -->
					<div class="card-header">
						<h4 class="card-header-title">@lang("blog.post.image")</h4>
					</div>
					<!-- End Header -->
					<!-- Body -->
					<div class="card-body">
						<x-slim-cropper :image="isset($post) ? $post->featured_image : null" />
						<!--<img class="card-img p-2" src="{{asset('svg/design-system/docs-dropzone.svg')}}"
							alt="Image Description" data-hs-theme-appearance="default">-->
					</div>
					<!-- Body -->
				</div>
				<div class="card mb-5">
					<!-- Header -->
					<div class="card-header">
						<h4 class="card-header-title">@lang("blog.post.details")</h4>
					</div>
					<!-- End Header -->
					<!-- Body -->
					<div class="card-body">
						<!-- Form -->
						<div class="mb-4">
							<label for="status" class="form-label">@lang("main.status")</label>
							<!-- Select -->
							<div class="tom-select-custom">
								<select class="js-select form-select" autocomplete="off" name="status">
									<option value="">@lang("options.select")</option>
									@foreach (App\Enums\Status::getValues() as $status)
									<option value="{{$status}}" @if(old('status', $post->status ?? null) == $status)
										selected @endif>@lang("status.".$status)</option>
									@endforeach
								</select>
							</div>
							<!-- End Select -->
						</div>
						<div class="mb-4">
							<label for="category" class="form-label">@lang("main.category")</label>
							<!-- Select -->
							<x-category-Tree type="App\Models\Post" :categories="$post->categories ?? null" />
							<!-- End Select -->
						</div>
						<!-- Form -->
						<!-- Form -->
						<div class="mb-4">
							<label for="collectionsLabel" class="form-label">@lang("main.tags")</label>
							<!-- Select -->
							<div class="tom-select-custom">
								<select class="js-select form-select" autocomplete="off" id="collectionsLabel" multiple name="tags[]"
									data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hideSearch": true,
                                    "placeholder": "Select collections"
                                  }'>
									<option value="Winter">Winter</option>
									<option value="Spring">Spring</option>
									<option value="Summer">Summer</option>
									<option value="Autumn">Autumn</option>
								</select>
							</div>
							<!-- End Select -->
						</div>
						<!-- Form -->
					</div>
					<!-- Body -->
				</div>
				<!-- End Card -->
			</div>
			<div class="col-lg-9 mb-3 mb-lg-0">
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
								<h4 class="card-header-title">@lang('blog.content')</h4>
							</div>
							<!-- End Header -->
							<!-- Body -->
							<div class="card-body">
								<!-- Form -->
								<div class="mb-4">
									<label for="title" class="form-label">@lang('blog.post.title')</label>
									<input type="text" class="form-control" name="title[{{$code}}]" id="title"
										value="{{old('title.'.$code, isset($post) ? $post->getTranslation('title', $code) : null )}}">
								</div>
								<div class="mb-4">
									<label for="slug" class="form-label">@lang('blog.post.slug')</label>
									<input type="text" class="form-control" name="slug[{{$code}}]" id="slug"
										value="{{old('slug.'.$code, isset($post) ? $post->getTranslation('slug', $code) : null )}}">
								</div>
								<label class="form-label">@lang('blog.post.body')</label>
								<x-tiny-mce-editor name="body[{{$code}}]"
									value="{{old('body.'.$code, isset($post) ? $post->getTranslation('body', $code) : null)}}" />
							</div>
							<!-- Body -->

							<!-- Header -->
							<div class="card-header">
								<h4 class="card-header-title">@lang('meta.content')</h4>
							</div>
							<!-- End Header -->
							<!-- Body -->
							<div class="card-body">
								<!-- Form -->
								<div class="mb-4">
									<label for="title" class="form-label">@lang('meta.title')</label>
									<input type="text" class="form-control" name="meta[title][{{$code}}]" id="title"
										value="">
								</div>
								<label class="form-label">@lang('meta.description')</label>
								<textarea name="meta[description][{{$code}}]" class="form-control"></textarea>
							</div>
							<!-- Body -->
						</div>
						@endforeach
					</div>
				</div>
				<!-- End Card -->
				<!-- End Col -->
			</div>
			<!-- End Row -->
			<div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
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
									<button type="button" class="btn btn-ghost-light">@lang('action.discard')</button>
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
<script>
	$(document).ready(function(){
		HSCore.components.HSTomSelect.init('.js-select')
	});
</script>
@prepend('js')
@endsection