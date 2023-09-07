<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Details</h4>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="title">Zone Name</label>
                <input name="title" class="form-control" wire.model="$method->title" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" wire.model="$method->description"></textarea>
            </div>
            <div class="form-group">
                <label for="zone">Regions</label>
                <select class="js-select form-select tomselected" multiple required>
                    <option value="0"
                        data-option-template='<div class="d-flex align-items-start"><div class="flex-shrink-0"><i class="bi-globe"></i></div><div class="flex-grow-1 ms-2"><span class="d-block fw-semi-bold">Global</span></div></div>'>
                        Global</option>
                    @foreach ($zones as $id => $zone)
                    <option value="{{$id}}"
                        data-option-template='<div class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{asset('/vendor/flag-icon-css/flags/1x1/'.strtolower(getCountry($zone)).'.svg')}}" alt="{{$zone}} Flag"/><span class="text-truncate">{{$zone}}</span>
            </div>'>{{$zone}}</option>
            @endforeach
            </select>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4 class="card-title">Methods</h4>
    </div>
    <div class="card-body">
        <div class="border p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="method_type">Method</label>
                        <select name="method_type" class="form-control">
                            <option value=""></option>
                            @foreach ($methods as $id => $method)
                            <option value="{{$id}}">{{$method}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="method_type">Method</label>
                        <input name=""
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn bt-link">Add Method</button>
        </div>
    </div>
</div>