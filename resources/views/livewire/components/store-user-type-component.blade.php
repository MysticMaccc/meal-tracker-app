<div>
    <x-submit-message />
    
    <form class="row" wire:submit.prevent=" @if (Session::get('user_type_id')) update @else create @endif" method="POST">
        @csrf
                <div class="col-md-12">
                            <label class="label">User Type</label>
                            <input type="text" class="form-control" wire:model="user_type"  >
                            @error('user_type') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>

                <div class="col-md-12 text-center mt-2">
                            <a wire:click="goBack()" class="text-primary">Go Back</a>
                </div>
    </form>

</div>
