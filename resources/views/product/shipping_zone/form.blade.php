@section('css')
    @prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('shipping_zone.title')</h1>
	</x-slot>
	<form action="@isset($shipping_zone){{route('shipping_zone.update', $shipping_zone)}}@else{{route('shipping_zone.store')}}@endisset"
		method="POST" data-type="ajax">
		@isset($shipping_zone)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
        		@livewire('w-shipping-zone')
			</div>
		</div>
    </form>

	@section('js')
	<script>
		HSCore.components.HSTomSelect.init(".js-select")
	</script>
	@endsection
</x-app-layout>