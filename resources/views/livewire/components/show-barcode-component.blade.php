<section>
        <div class="row">
                <div class="col-md-6 offset-md-6 mt-2">
                        <input type="text" class="form-control" wire:model.live="search" 
                        placeholder="Enter card number, barcode, category, owner, course...">
                </div>

                <div class="table-responsive mt-2 col-md-12">
                        <x-submit-message />
                        <table class="table table-striped table-hover">
                                        <thead>
                                                <tr>
                                                        <th>Card Number</th>
                                                        <th>Barcode</th>
                                                        <th>Category</th>
                                                        <th>Category Type</th>
                                                        <th>Owner</th>
                                                        <th>Company</th>
                                                        <th>Valid From</th>
                                                        <th>Valid To</th>
                                                        <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($barcode_data as $data)
                                                        <tr>
                                                                <td>{{ $data->card_number }}</td>
                                                                <td>{{ $data->barcode_value }}</td>
                                                                <td>{{ $data->category->name  }}</td>
                                                                <td>{{ $data->category_type->name  }}</td>
                                                                <td>{{ $data->owner }}</td>
                                                                <td>{{ $data->company }}</td>
                                                                <td>{{ $data->start_date }}</td>
                                                                <td>{{ $data->end_date }}</td>
                                                                <td>
                                                                        <button class="m-1 btn btn-sm btn-info rounded-3" title="Print Card" wire:click="generate_Barcode({{$data->id}})">
                                                                                <i class="bi bi-qr-code"></i>
                                                                        </button>
                                                                        <button class="m-1 btn btn-sm btn-info rounded-3" title="Edit" wire:click="editinfo({{$data->id}})">
                                                                                <i class="bi bi-pencil"></i>
                                                                        </button>
                                                                </td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                        </table>
                </div>

                <div class="col-md-12">
                        {{ $barcode_data->links("livewire::simple-bootstrap") }}
                </div>
        </div>
</section>