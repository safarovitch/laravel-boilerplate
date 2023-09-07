@section('css')
    @prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('shipping_methods.title')</h1>
	</x-slot>
	<x-slot name="buttons">
		<button form="form" class="btn btn-success">@lang('action.save')</button>
	</x-slot>
	<form action="@isset($shipping_method){{route('shipping_method.update', $shipping_method)}}@else{{route('shipping_method.store')}}@endisset"
		method="POST" data-type="ajax" id="form">
		@isset($shipping_method)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
        		@livewire('w-shipping-method')
			</div>
    </form>

	@section('js')
	<script>
		HSCore.components.HSTomSelect.init(".js-select")
	</script>
	@endsection

</x-app-layout>