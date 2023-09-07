@section('css')
@prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('promocodes.title')</h1>
	</x-slot>
	<x-slot name="buttons">
		<button form="promocodeform" class="btn btn-success">@lang('action.save')</button>
	</x-slot>
	<div class="card">
		<div class="card-body">
			<form class=""
				action="@isset($promocode){{ route('promocode.update', $promocode) }}@else{{ route('promocode.store') }}@endisset"
				method="POST" id="promocodeform">
				@isset($promocode)
				@method('PUT')
				@endisset
				@csrf
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group mb-4">
							<label>promocode code</label>
							<input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
								placeholder="promocode Code" required value="{{ old('code', $promocode->code ?? null) }}">
							@error('code')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group mb-4">
							<label>Quantity</label>
							<input class="form-control @error('quantity') is-invalid @enderror" type="number"
								name="quantity" placeholder="Quantity" required
								value="{{ old('quantity', $promocode->quantity ?? null) }}">
							@error('quantity')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-check mb-4">
							<input class="form-check-input" type="checkbox" name="is_disposable" value="1"
								id="is_disposable" @if( old('is_disposable', $promocode->is_disposable ?? null) ) checked
							@endif">
							<label class="form-check-label" for="is_disposable">
								Is Disposable ( one use per user )
							</label>
						</div>
						<div class="form-group mb-4">
							<label>Discount amount</label>
							<input class="form-control @error('data.discount') is-invalid @enderror" type="number"
								step="0.01" name="data[discount]" placeholder="Discount" required
								value="{{ old('data.discount', $promocode->data['discount'] ?? null) }}">
							@error('data.discount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group mb-4">
							<label>Discount type</label>
							<select class="form-control @error('data.type') is-invalid @enderror" name="data[type]"
								required>
								<option></option>
								<option value="percent" @if( old('data.type', $promocode->data['type'] ?? null) ==
									'percent' ) selected @endif>Percent</option>
								<option value="fixed" @if( old('data.type', $promocode->data['type'] ?? null) == 'fixed' )
									selected @endif>Fixed</option>
							</select>
							@error('data.type')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group mb-4">
							<label>promocode expiry date</label>
							<input class="form-control @error('expires_at') is-invalid @enderror" type="date"
								name="expires_at" placeholder="Expiry Date"
								value="{{ old('expires_at', isset($promocode) ? $promocode->expires_at->format('Y-m-d') : null) }}">
							@error('expires_at')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-12 col-md-6">
						<label>Only Apply To Selected Products</label>
						<select class="form-control js-select" data-control="select2" data-hide-search="true" multiple name="products[]" data-placeholder="Select products" data-hassubitems="">
							<option></option>
							@foreach( $products as $product )
							<option value="{{ $product->id }}" @if( in_array( $product->id, old('data.products', explode(',', $promocode->data['products'] ?? ''))) ) selected @endif{{ $product->title }} >{{$product->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	@section('js')
	<script>
  		// INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')
	</script>
	@endsection
</x-app-layout>