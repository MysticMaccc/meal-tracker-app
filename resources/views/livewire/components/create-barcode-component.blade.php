<div>
        <x-submit-message />
        
        <form class="row" wire:submit.prevent="create" method="POST">
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
                                <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </div>
        </form>

</div>
