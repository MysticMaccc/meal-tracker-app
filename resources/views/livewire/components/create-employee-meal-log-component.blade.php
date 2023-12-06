<div>
    <x-submit-message />
    
    <form class="row" wire:submit.prevent="save" method="POST">
        @csrf
                <div class="col-md-12">
                            <label class="label">Scan Here</label>
                            <input type="text" class="form-control" wire:model="barcode_value" wire:keydown="create" autofocus>
                            @error('barcode_value') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>
    </form>

</div>
