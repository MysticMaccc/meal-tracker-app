<div>
    <x-submit-message />
    
    <form class="row" wire:submit.prevent="save" method="POST">
        @csrf
                <div class="col-md-12">
                            <label class="label">Scan Here</label>
                            <input type="text" class="form-control" wire:model="trainee_id" wire:keydown="create" {{$autofocus}}>
                            @error('trainee_id') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>
    </form>

</div>
