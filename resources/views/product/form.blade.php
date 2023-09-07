@section('css')
@prepend('css')

<style>
#options .nav-pills .nav-link{
	background-color: white;
}
#options .nav-pills .nav-link.active, #options .nav-pills .show>.nav-link{
	background-color: transparent;
}
</style>
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('product.title')</h1>
	</x-slot>
	<form action="@isset($product){{route('product.update', $product)}}@else{{route('product.store')}}@endisset"
		method="POST" data-type="ajax">
		@isset($product)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-12">
				@if($errors->any())
					{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
				@endif
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
								<h4 class="card-header-title">@lang('product.content')</h4>
							</div>
							<!-- End Header -->
							<!-- Body -->
							<div class="card-body">
								<!-- Form -->
								<div class="form-group mb-4">
									<label for="title" class="form-label">@lang('product.title')</label>
									<input type="text" class="form-control" name="title[{{$code}}]" id="title"
										value="{{old('title.'.$code, isset($product) ? $product->getTranslation('title', $code) : null )}}">
								</div>
								<div class="form-group mb-4">
									<label for="slug" class="form-label">@lang('product.slug')</label>
									<input type="text" class="form-control" name="slug[{{$code}}]" id="slug"
										value="{{old('slug.'.$code, isset($product) ? $product->getTranslation('slug', $code) : null )}}">
								</div>
								<!-- End Form -->
								<div class="form-group mb-4">
									<label class="form-label">@lang('product.desc')</label>
									<x-tiny-mce-editor name="desc[{{$code}}]"
										value="{{old('desc.'.$code, isset($product) ? $product->getTranslation('desc', $code) : null)}}" />
								</div>
								<div class="form-group mb-4">
									<label class="form-label">@lang('product.short_desc')</label>
									<textarea class="form-control" name="short_desc[{{$code}}]"
										rows="3">{{old('short_desc.'.$code, isset($product) ? $product->getTranslation('short_desc', $code) : null)}}</textarea>
								</div>
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

				<div class="card card-flush p-4 mb-5" id="options">
					<!--begin::Card header-->
					<div class="card-header d-flex flex-column">
						<div class="card-title">
							<h2>{{__("Product Options")}}</h2>
						</div>
					</div>
					<div class="card-body p-0">
						<div class="d-flex align-items-start bg-gray-100">
							<div class="nav flex-column nav-pills text-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<button class="text-start rounded-0 nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Price</button>
								{{-- <button class="text-start rounded-0 nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Inventory</button> --}}
								{{-- <button class="text-start rounded-0 nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Shipping</button> --}}
								<button class="text-start rounded-0 nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Attributes</button>
								{{-- <button class="text-start rounded-0 nav-link" id="v-pills-variations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-variations" type="button" role="tab" aria-controls="v-pills-variations" aria-selected="false">Variations</button> --}}
							  </div>
							<div class="tab-content flex-1" id="v-pills-tabContent">
								<div class="tab-pane fade show active p-3 h-100 w-100" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<div class="row">
										<!--end::Card header-->
										@foreach (config('app.site_currencies') as $code => $currency)
			
										<div class="form-group mb-3 col-12 col-lg-6">
											<label>@lang('product.price')</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
														id="inputGroup-price">{{$currency['icon']}}</span>
												</div>
												<input name="price[{{$code}}]" type="number" class="form-control"
													value="{{old('price.'.$code, isset($product) ? ($product->price[$code] ?? null) : null )}}">
											</div>
										</div>
										@endforeach
									</div>
								</div>
								<div class="tab-pane fade p-3 h-100 w-100" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
									<div class="row">
										<!--end::Card header-->
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.sku')</label>
											<input name="sku" type="text" class="form-control"
												value="{{old('sku', isset($product) ? $product->sku : null)}}">
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.barcode')</label>
											<input name="barcode" type="number" class="form-control"
												value="{{old('barcode', isset($product) ? $product->barcode : null)}}">
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.qty')</label>
											<input name="qty" type="number" class="form-control"
												value="{{old('qty', isset($product) ? $product->qty : null)}}">
										</div>
									</div>
								</div>
								<div class="tab-pane fade p-3 h-100 w-100" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
									<div class="row">
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<x-tag :taggable="$product ?? null" :tags="$product->shippingClass ?? null" model="App\Models\ShippingClass" field="shipping_class" empty="true"/>
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.length')</label>
											<input name="length" type="number" class="form-control"
												value="{{old('length', isset($product) ? $product->length : null)}}">
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.height')</label>
											<input name="height" type="number" class="form-control"
												value="{{old('height', isset($product) ? $product->height : null)}}">
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.width')</label>
											<input name="width" type="number" class="form-control"
												value="{{old('width', isset($product) ? $product->width : null)}}">
										</div>
										<div class="form-group mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
											<label>@lang('product.weight')</label>
											<input name="weight" type="number" class="form-control"
												value="{{old('weight', isset($product) ? $product->weight : null)}}">
										</div>
									</div>
								</div>
								<div class="tab-pane fade p-3 h-100 w-100" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
									@livewire('product-attributes')
								</div>
								<div class="tab-pane fade p-3 h-100 w-100" id="v-pills-variations" role="tabpanel" aria-labelledby="v-pills-variations-tab">
									<div class="mb-5 w-100" data-parent="{{ \App\Enums\ProductType::VARIABLE }}">
										@livewire('product-variations', ['product' => $product ?? new App\Models\Product()])
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Col -->
			</div>

			<div class="col-lg-3">
				<!-- Card -->
				<div class="card mb-5">
					<!-- Header -->
					<div class="card-header">
						<h4 class="card-header-title">@lang("product.image")</h4>
					</div>
					<!-- End Header -->
					<!-- Body -->
					<div class="card-body">
						<x-slim-cropper :image="isset($product) ? $product->featured_image : null" />
					</div>
					<!-- Body -->
				</div>

				<!-- Card -->
				<div class="card mb-3 mb-lg-5">
					<!-- Header -->
					<div class="card-header card-header-content-between">
						<h4 class="card-header-title">@lang('product.gallery.title')</h4>

						<!-- Dropdown -->
						<div class="dropdown">
							{{-- <button type="button" class="btn btn-ghost-secondary btn-sm" id="mediaDropdown"
								data-bs-toggle="dropdown" aria-expanded="false">
								Add media from URL <i class="bi-chevron-down"></i>
							</button>

							<div class="dropdown-menu dropdown-menu-end mt-1">
								<a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
									data-bs-target="#addImageFromURLModal">
									<i class="bi-link dropdown-item-icon"></i> Add image from URL
								</a>
								<a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
									data-bs-target="#embedVideoModal">
									<i class="bi-youtube dropdown-item-icon"></i> Embed video
								</a>
							</div> --}}
						</div>
						<!-- End Dropdown -->
					</div>
					<!-- End Header -->

					<!-- Body -->
					<div class="card-body">
						<!-- Gallery -->
						<div id="productImageGallery" class="row gx-3">
							@isset($product)
							@foreach ( $product->gallery() as $image )
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-3 mb-lg-5" id="galleryImage-{{$image->id}}">
								<x-slim-cropper :image="$image->getUrl()" field="gallery_image-{{$loop->index}}"/>
								<!-- Card -->
								{{-- <div class="card card-sm">
									<img class="card-img-top" src="{{ $image->getUrl() }}" alt="">
									<input name="gallery_images[]" id="existing_gallery_images" type="text" multiple value="{{$image->getUrl()}}"/>
									<div class="card-body">
										<div class="row col-divider text-center">
											<div class="col">
												<a class="text-body" href="{{ $image->getUrl() }}"
													data-bs-toggle="tooltip" data-bs-placement="top" title="View"
													data-fslightbox="gallery">
													<i class="bi-eye"></i>
												</a>
											</div>
											<!-- End Col -->

											<div class="col">
												<a class="text-danger" href="javascript:;" data-bs-toggle="tooltip"
													data-bs-placement="top" title="Delete" onclick="deleteGalleryImage('#galleryImage-{{$image->id}}')">
													<i class="bi-trash"></i>
												</a>
											</div>
											<!-- End Col -->
										</div>
										<!-- End Row -->
									</div>
									<!-- End Col -->
								</div>
								<!-- End Card --> --}}
							</div>
							<!-- End Col -->
							@endforeach
							@endisset

							<!-- End Dropzone -->
							<div class="file-drop-area">
								<div class="text-center w-100 py-4 border-1 dz-message my-2" data-dz-message>
									@lang('dropzone.message')
								</div>
								<input name="gallery_images[]" id="gallery_images" type="file" multiple />
								<div class="preview row">
									
								</div>
							</div>
						</div>

						{{--
						<!-- Dropzone -->
						<div id="galleryDropZone" class="d-flex justify-content-center text-center">
							<!-- End Dropzone -->
							<div class="file-drop-area">
								<div class="dz-message mb-7">
									<img class="avatar avatar-xl avatar-4x3 mb-3"
										src="{{asset('svg/illustrations/oc-browse.svg')}}" alt="Image Description"
										data-hs-theme-appearance="default">
									<img class="avatar avatar-xl avatar-4x3 mb-3"
										src="{{asset('svg/illustrations-light/oc-browse.svg')}}" alt="Image Description"
										data-hs-theme-appearance="dark">
									@lang('dropzone.message')
								</div>
								<input name="files[]" id="files" type="file" multiple />
							</div>
						</div> --}}
					</div>
					<!-- Body -->
				</div>
				<!-- End Card -->

				<div class="card mb-5">
					<!-- Header -->
					<div class="card-header">
						<h4 class="card-header-title">@lang("product.details")</h4>
					</div>
					<!-- End Header -->
					<!-- Body -->
					<div class="card-body">
						<!-- Form -->
						<div class="form-group mb-3">
							<label>@lang('product.type')</label>
							<select name="type" class="form-control" data-control="select2" data-hide-search="true"
								data-hassubitems="">
								@foreach (\App\Enums\ProductType::asSelectArray() as $key => $value )
								<option value="{{$key}}" @if(old('type', isset($product) ? $product->type : null) ==
									$key) selected @endif>@lang('enum.'.$value)</option>
								@endforeach
							</select>
						</div>
						<div class="mb-4">
							<label for="status" class="form-label">@lang("main.status")</label>
							<!-- Select -->
							<div class="tom-select-custom">
								<select class="js-select form-select" autocomplete="off" name="status">
									<option value="">@lang("options.select")</option>
									@foreach (App\Enums\Status::getValues() as $status)
									<option value="{{$status}}" @if(old('status', $product->status ?? App\Enums\Status::DRAFT) == $status)
										selected @endif>@lang("status.".$status)</option>
									@endforeach
								</select>
							</div>
							<!-- End Select -->
						</div>
						<div class="mb-4">
							<label for="category" class="form-label">@lang("main.category")</label>
							<!-- Select -->
							<x-category-Tree type="App\Models\Product" :categories="$product->categories ?? null" />
							<!-- End Select -->
						</div>
						<div class="mb-4">
							<label for="category" class="form-label">@lang("main.product.services")</label>
							<x-services-list :services="$product->services ?? []" />
						</div>
						<div class="mb-4">
							<x-tag :taggable="$product ?? null" :tags="$product->brand ?? null" model="App\Models\Brand" field="brand" empty="true"/>
						</div>
					</div>
					<!-- Body -->
				</div>
				<!-- End Card -->
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
</x-app-layout>

<!-- End Content -->
@section('js')
<script src="{{ asset('/vendor/fslightbox/index.js')}}"></script>
<script>
	Dropzone.autoDiscover = false;
	$(document).delegate('[data-hassubitems]', 'change', function() {
		var val = $(this).val();
		$('[data-parent]').hide();
		$('[data-parent]').find('input textarea select').attr('disabled', 'disabled');
		$('[data-parent="' + val + '"]').show();
		$('[data-parent="' + val + '"]').removeAttr('disabled');
	});

	$(document).delegate('#generate_variations', 'click', function() {
		toastr.info('Processing...');
		$('#product_vairtions').html('');
		$('#product_vairtions').load('{{ route("product.variations") }}', {
			product_id: '{{ $product->id ?? null }}',
			variations: $('[name="variations[]"]').val(),
			_token: '{{ csrf_token() }}'
		}, function() {
			toastr.success("Variations generated successfully");
		});
	});
</script>
<script>
		// 1. Handling the various events
		// - get references to different elements we need
		// - listen to drag, drop and change events
		// - handle dropped and selected files

		// get a reference to the file drop area and the file input
		var fileDropArea = document.querySelector('#productImageGallery .file-drop-area');
		var dropZone = document.querySelector('#productImageGallery .file-drop-area');
		var filePreviewArea = document.querySelector('#productImageGallery .file-drop-area .preview');
		var fileInput = fileDropArea.querySelector('input');
		var fileInputName = fileInput.name;

		// listen to events for dragging and dropping
		fileDropArea.addEventListener('dragover', handleDragOver);
		fileDropArea.addEventListener('drop', handleDrop);
		fileInput.addEventListener('change', handleFileSelect);
		// 4. Disable the file input element

		// hide file input, we can now upload with JavaScript
		fileInput.style.display = 'none';

		// remove file input name so it's value is
		// not posted to the server
		fileInput.removeAttribute('name');

		$(document).ready(function() {
			$('[data-parent]').hide();
			$('[data-hassubitems]').trigger('change');
			// INITIALIZATION OF DROPZONE
			// =======================================================
			// HSCore.components.HSDropzone.init('#galleryDropZone')
			var myDropzone = new Dropzone(
				dropZone,
				{
					url: '#',
					autoProcessQueue: false,
					addedfile: function(file){
						createCropper(file)
					}
				}
			);
		});

		// need to block dragover to allow drop
		function handleDragOver(e) {
			e.preventDefault();
		}

		// deal with dropped items,
		function handleDrop(e) {
			e.preventDefault();
			handleFileItems(e.dataTransfer.items || e.dataTransfer.files);
		}

		// handle manual selection of files using the file input
		function handleFileSelect(e) {
			handleFileItems(e.target.files);
		}

		// 2. Handle the dropped items
		// - test if the item is a File or a DataTransferItem
		// - do some expectation matching

		// loops over a list of items and passes
		// them to the next function for handling
		function handleFileItems(items) {
			var l = items.length;
			for (var i = 0; i < l; i++) {
				handleItem(items[i]);
			}
		}

		// handles the dropped item, could be a DataTransferItem
		// so we turn all items into files for easier handling
		function handleItem(item) {
			// get file from item
			var file = item;
			if (item.getAsFile && item.kind == 'file') {
				file = item.getAsFile();
			}

			handleFile(file);
		}

		// now we're sure each item is a file
		// the function below can test if the files match
		// our expectations
		function handleFile(file) {
			/*
		// you can check if the file fits all requirements here
		// for example:
		// if file is bigger then 1 MB don't load
		if (file.size > 1000000) {
			return;
		}
		*/

			// if it does, create a cropper
			createCropper(file);
		}

		// 3. Create the Image Cropper
		// - create an element for the cropper to bind to
		// - add the element after the drop area
		// - creat the cropper and bind the remove button so it
		//   removes the entire cropper when clicked.

		// create an Image Cropper for each passed file
		function createCropper(file) {
			// create container element for cropper
			var wrapper = document.createElement('div');
			var cropper = document.createElement('div');
			wrapper.classList.add("col-12","col-md-6","col-lg-4","col-xl-2");
			cropper.classList.add("my-2");

			// insert this element after the file drop area
			wrapper.appendChild(cropper);
			filePreviewArea.appendChild(wrapper, fileDropArea);

			// create a Slim Cropper
			Slim.create(cropper, {
				ratio: '{{ getImageRatioFromSize(\App\Enums\ImageSize::PRODUCT_GALLERY_IMAGE_SIZE) }}',
				defaultInputName: fileInputName,
				didInit: function () {
					// load the file to our slim cropper
					this.load(file);
				},
				didRemove: function () {
					// detach from DOM
					filePreviewArea.removeChild(wrapper);
					// destroy the slim cropper
					this.destroy();
				},
			});
		}


		function deleteGalleryImage(id){
			if(confirm("Delete image from library?"))
				$(id).remove();
		}
</script>
@prepend('js')
@endsection