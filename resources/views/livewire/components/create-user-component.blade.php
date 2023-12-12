<div>
    <x-submit-message />
    
    <form class="row" wire:submit.prevent="create" method="POST">
        @csrf
                <div class="col-md-12">
                        <label class="label">Name</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-12">
                        <label class="label">Email</label>
                        <input type="text" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-12">
                        <label class="label">Password</label>
                        <div class="input-group">
                                <input type="text" class="form-control" wire:model="password" readonly>
                                <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" wire:click="generatePassword()">Generate Password</button>
                                </div>
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                </div>

                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>
    </form>

</div>
