<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Details</h4>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="title">Name</label>
                <input name="title" class="form-control" wire:model="method.title.en" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" wire:model="method.description.en"></textarea>
            </div>
        </div>
    </div>
</div>