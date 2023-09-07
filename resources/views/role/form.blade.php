@section('css')
@prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('role.title')</h1>
	</x-slot>
	<form action="@isset($user){{route('user.update', $user)}}@else{{route('user.store')}}@endisset" method="POST"
		data-type="ajax">
		@isset($user)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col col-lg-6">
				<div class="card mb-2">
					<div class="card-header">
						<h4 class="card-title">Permissions</h4>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label" for="roleNameLabel">Role Name</label>
							<input type="text" id="roleNameLabel" class="form-control" name="name"
								value="{{ old('name', $role->name) }}">
						</div>
						<div class="mb-3">
							<label class="form-label" for="roleGuardNameLabel">Role Guard</label>
							<select name="guard_name" class="form-control">
								@foreach(config('auth.guards') as $id => $guard)
								<option value="{{$id}}" @if( old('guard_name', $role->guard_name) == $id ) selected @endif>{{$id}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-lg-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Permissions</h4>
					</div>
					<div class="card-body">
						@forelse ($permissions as $permission)
						@if($loop->index == 0 or $loop->index % 3 == 0)<div class="mb-2 row">@endif
							<div class="form-check form-check-inline col">
								<input type="checkbox" id="permission{{$loop->index}}" class="form-check-input"
									name="permissions[]" @if( in_array($permission->name, old('permissions', $role->permissions()->pluck('name')->toArray()))) checked @endif>
								<label class="form-check-label" for="permission{{$loop->index}}">{{ $permission->name }}</label>
							</div>
							<!-- End Form Check -->
						@if($loop->iteration % 3 == 0)</div>@endif
						@empty
						<p>No Permissions found</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</form>
	@section('js')
	<script>

	</script>
	@endsection
</x-app-layout>