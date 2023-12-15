<div>
    <x-submit-message />
    
    <form class="row" wire:submit.prevent="@if(Session::get('user_id')) update @else create @endif " method="POST">
        @csrf
                <div class="col-md-4 offset-md-4">
                        <label class="label">Name</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-4 offset-md-4">
                        <label class="label">Email</label>
                        <input type="text" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-4 offset-md-4">
                        <label class="label">User Type</label>
                        <select wire:model="user_type_id" class="form-control">
                                <option value="" >Select</option>
                                @foreach ($user_type_data as $data)
                                        <option value="{{$data->id}}" 
                                                >{{$data->name}}</option>
                                @endforeach
                        </select>
                        @error('user_type_id') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                @if (Session::get('user_id'))
                        <div class="col-md-4 offset-md-4 mt-1 text-end">
                                <input class="form-check-input" type="checkbox" wire:model="checkbox" wire:click="Checkbox">
                                <label class="form-check-label" for="flexCheckChecked">
                                        Change password?
                                </label>
                        </div>
                @endif

                @if ($checkbox)
                        <div class="col-md-4 offset-md-4">
                                <label class="label">Password</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" wire:model="password" readonly>
                                        <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" wire:click="generatePassword()">Generate Password</button>
                                        </div>
                                </div>
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                @endif
                

                <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>

                <div class="col-md-4 offset-md-4 text-center">
                                <a href="{{route('Manage-User.index')}}" wire:navigate>Go Back</a>
                </div>
    </form>

</div>
