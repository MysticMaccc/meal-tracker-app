<div>
        <x-loader/>
        <x-submit-message />
        @if ($update_done)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                 <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <strong>Update Successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>            
        @endif
        @if (session()->has('idtoedit'))
                <form class="row" wire:submit.prevent="update" method="POST">       
        @else
                <form class="row" wire:submit.prevent="create" method="POST">
        @endif
                
            @csrf
                
                    <div class="col-md-12">
                                <label class="label">Card Number</label>
                                <input type="text" class="form-control" wire:model="card_number" readonly>
                                @error('card_number') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Barcode Value</label>
                                <input type="text" class="form-control" wire:model="barcode_value" readonly>
                                @error('barcode_value') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Category</label>
                                <select wire:model="category_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($category_data as $cat_data)
                                                <option value="{{$cat_data->id}}">{{$cat_data->name}}</option>
                                        @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Category Type</label>
                                <select wire:model="category_type_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($category_type_data as $cat_type_data)
                                                <option value="{{$cat_type_data->id}}">{{$cat_type_data->name}}</option>
                                        @endforeach
                                </select>
                                @error('category_type_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Owner</label>
                                <input type="text" class="form-control" wire:model="owner">
                                @error('owner') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Company</label>
                                <input type="text" class="form-control" wire:model="company">
                                @error('company') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Valid from</label>
                                <input type="date" class="form-control" wire:model="start_date">
                                @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-md-12">
                                <label class="label">Valid to</label>
                                <input type="date" class="form-control" wire:model="end_date">
                                @error('end_date') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        @if (session()->has('idtoedit'))
                                <button type="submit" class="btn btn-info mt-2">Update</button>         
                        @else
                                <button type="submit" class="btn btn-primary mt-2">Save</button>  
                        @endif
                    </div>
        </form>

</div>
