@section('css')
@prepend('css')

@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('menu-builder.title')</h1>
	</x-slot>

    <x-slot name="buttons">
        <button class="btn btn-success" form="contentForm">
            @isset($menu)
            <i class="bi bi-plus-circle"></i> @lang('menu-builder.update')
            @else
            <i class="bi bi-plus-circle"></i> @lang('menu-builder.store')
            @endisset
        </button>
    </x-slot>

	<form action="@isset($menu){{route('menu.update', [$menu])}}@else{{route('menu.store')}}@endisset" data-type="ajax"
		method="POST" data-type="ajax" id="contentForm">
		@isset($menu)
		@method('PUT')
		@endisset

		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">@lang('menu-builder.form.info-title')</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">@lang('menu-builder.form.name')</label>
							<input class="form-control" name="name" type="text" value="{{old('name', $menu->name ?? null)}}">
						</div>
						<div class="form-group mt-3">
							<label for="short_code">@lang('menu-builder.form.short_code')</label>
							<input class="form-control form-control-sm" name="short_code" type="text" value="{{old('short_code', $menu->short_code ?? null)}}">
						</div>
						<div class="form-group mt-3">
							<label for="sort_order">@lang('menu-builder.form.order')</label>
							<input class="form-control form-control-sm" name="sort_order" type="text" value="{{old('sort_order', $menu->sort_order ?? null)}}">
						</div>
						<div class="form-group mt-3">
							<label for="css">@lang('menu-builder.form.css')</label>
							<input class="form-control form-control-sm" name="css" type="text" value="{{old('css', $menu->css ?? null)}}">
						</div>
						<div class="form-group mt-3">
							<label for="active">{{__('menu-builder.form.status')}}</label>
							<div class="form-check form-switch mt-3">
								<input class="form-check-input" name="active" type="checkbox" id="active" value="true"
									@if( old('active', $menu->active ?? null) )
								checked="" @endif>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">@lang('menu-builder.form.content-title')</h3>
					</div>
					<div class="card-body">
						<div data-repeater="">
							<div data-repeater-list="menu_items" id="menu_items" class="row">
								@isset($menu)
								@forelse ($menu->items as $item)
								<div data-repeater-item=""
									class="form-group d-flex flex-column flex-wrap gap-3 align-items-center mb-3 accordion" id="accordion">
									<div class="card h-100 w-100 accordion-item">
										<div class="card-header accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index}}" aria-expanded="false">
											<div class="d-flex justify-content-between align-items-center">
												<strong data-item-title=""># {{ $item->title }}</strong>
												<button type="button" data-repeater-delete=""
													class="btn btn-xs btn-icon btn-danger" data-item-id="">
													<i class="bi bi-trash"></i>
												</button>
											</div>
										</div>
										<div id="collapse-{{$loop->index}}" class="card-body accordion-collapse collapse collapsed" >
											<div class="row">
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="title">@lang('menu-builder.form.item.title')</label>
														<input class="form-control form-control-sm" name="title" value="{{ $item->title }}"
															type="text">
															<input class="form-control form-control-sm" name="id" value="{{ $item->id }}"
															type="hidden">
													</div>
													<div class="form-group mt-3">
														<label for="icon">@lang('menu-builder.form.item.icon')</label>
														<input class="form-control form-control-sm" name="icon" value="{{ $item->icon}}"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="order">@lang('menu-builder.form.item.order')</label>
														<input class="form-control form-control-sm" name="sort_order" value="{{ $item->sort_order}}"
															type="number">
													</div>
												</div>
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="type">@lang('menu-builder.form.item.type')</label>
														<select name="type" class="form-control form-control-sm">
															@foreach (\App\Enums\MenuItemType::asArray() as $title => $type)
																<option value="{{$type}}">{{$title}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group mt-3">
														<label for="url">@lang('menu-builder.form.item.url')</label>
														<input class="form-control form-control-sm" name="url" value="{{ $item->url}}"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="active">{{__('menu-builder.form.item.status')}}</label>
														<div class="form-check form-switch mt-3">
															<input class="form-check-input" name="active" type="checkbox" id="active" value="1" @if($item->active)
															checked="" @endif>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@empty
								<div data-repeater-item=""
								class="form-group d-flex flex-column flex-wrap gap-3 align-items-center mb-3 accordion" id="accordion">
									<div class="card h-100 w-100 accordion-item">
										<div class="card-header accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false">
											<div class="d-flex justify-content-between align-items-center">
												<strong data-item-title="">#</strong>
												<button type="button" data-repeater-delete=""
													class="btn btn-xs btn-icon btn-danger" data-item-id="">
													<i class="bi bi-trash"></i>
												</button>
											</div>
										</div>
										<div id="collapse" class="card-body accordion-collapse collapse collapsed" >
											<div class="row">
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="title">@lang('menu-builder.form.item.title')</label>
														<input class="form-control form-control-sm" name="title"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="icon">@lang('menu-builder.form.item.icon')</label>
														<input class="form-control form-control-sm" name="icon"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="order">@lang('menu-builder.form.item.order')</label>
														<input class="form-control form-control-sm" name="sort_order"
															type="number">
													</div>
												</div>
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="type">@lang('menu-builder.form.item.type')</label>
														<select name="type" class="form-control form-control-sm">
															@foreach (\App\Enums\MenuItemType::asArray() as $title => $type)
																<option value="{{$type}}">{{$title}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group mt-3">
														<label for="url">@lang('menu-builder.form.item.url')</label>
														<input class="form-control form-control-sm" name="url"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="active">{{__('menu-builder.form.item.status')}}</label>
														<div class="form-check form-switch mt-3">
															<input class="form-check-input" name="active" type="checkbox" id="active" value="1"
															checked="">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforelse
								@else
								<div data-repeater-item=""
									class="form-group d-flex flex-column flex-wrap gap-3 align-items-center mb-3 accordion" id="accordion">
									<div class="card h-100 w-100 accordion-item">
										<div class="card-header accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false">
											<div class="d-flex justify-content-between align-items-center">
												<strong data-item-title="">#</strong>
												<button type="button" data-repeater-delete=""
													class="btn btn-xs btn-icon btn-danger" data-item-id="">
													<i class="bi bi-trash"></i>
												</button>
											</div>
										</div>
										<div id="collapse" class="card-body accordion-collapse collapse collapsed" >
											<div class="row">
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="title">@lang('menu-builder.form.item.title')</label>
														<input class="form-control form-control-sm" name="title"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="icon">@lang('menu-builder.form.item.icon')</label>
														<input class="form-control form-control-sm" name="icon"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="order">@lang('menu-builder.form.item.order')</label>
														<input class="form-control form-control-sm" name="sort_order"
															type="number">
													</div>
												</div>
												<div class="col-12 col-lg-6">
													<div class="form-group mt-3">
														<label for="type">@lang('menu-builder.form.item.type')</label>
														<select name="type" class="form-control form-control-sm">
															@foreach (\App\Enums\MenuItemType::asArray() as $title => $type)
																<option value="{{$type}}">{{$title}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group mt-3">
														<label for="url">@lang('menu-builder.form.item.url')</label>
														<input class="form-control form-control-sm" name="url"
															type="text">
													</div>
													<div class="form-group mt-3">
														<label for="active">{{__('menu-builder.form.item.status')}}</label>
														<div class="form-check form-switch mt-3">
															<input class="form-check-input" name="active" type="checkbox" id="active" value="1"
															checked="">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endisset
							</div>

							<button type="button" data-repeater-create="" class="btn btn-sm btn-primary mt-5">
								<i class="bi bi-plus"></i> {{ __('repeater.add') }}
							</button>

						</div>
					</div>
				</div>
			</div>
		</div>

		@csrf
	</form>

	@section('js')
	<script src="{{ asset('/vendor/formrepeater/formrepeater.bundle.js')}}"></script>
	<script>
		$(document).ready(function(){
            $repeater = $("[data-repeater]").repeater({
                initEmpty: !1,
                repeaters: [{
                    // (Required)`enter code here`
                    // Specify the jQuery selector for this nested repeater
                    selector: '.inner-repeater'
                }],
                show: function() {
                    // $('[data-repeater-item]').find('[data-control="select2"]').select2();
                    $(this).find('[data-repeater-delete]').removeAttr('data-item-id');
                    count = $('[data-repeater-list]').find('[data-repeater-item]').length;

					bsTarget = $(this).find('.accordion-header').data('bs-target');
					newBsTarget = bsTarget.replace('#','')+'-'+count;
					$(this).find('.accordion-header').attr('data-bs-target', '#'+newBsTarget).find('[data-item-title]').text('#')
					// $(this).find(bsTarget).prop('id', newBsTarget);

                    $(this).find('[id]').each((index,element) => {
                        id = $(element).attr('id');
                        $(element).attr('id', id + '-' + count);
                        if( $(element).data('bs-toggle') == 'tab'){
                            data_target = $(element).data('bs-target');
                            $(element).attr('data-bs-target', data_target + '-' + count);
                        }
                    });
                    $(this).find('input[data-part-id]').each(function(v,e){
                        $(e).val($(e).data('part-id'));
                    });
                    $(this).find('[data-image-selector] img').attr('src', 'https://via.placeholder.com/500x180&text=select image');
                }
            });
        });
	</script>
	@endsection
</x-app-layout>