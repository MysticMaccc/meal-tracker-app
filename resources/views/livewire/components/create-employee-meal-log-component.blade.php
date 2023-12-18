<div class="row">
    <div class="col-md-12 mt-2">
        <x-submit-message />
    </div>

    <div class="col-md-12">
        <label class="label">Scan Here</label>
        <input type="text" class="form-control" wire:model="barcode_value" wire:keydown="create" {{$autofocus}}>
        @error('barcode_value') <span class="text-danger">{{$message}}</span> @enderror

     
    </div>



</div>