<section>
        <x-loader/>
        <div class="row">
                <div class="col-md-6 offset-md-6 mt-2">
                        <input type="text" class="form-control" wire:model.live="search" 
                        placeholder="Enter card number, barcode, category, owner, course...">
                </div>

                <div class="table-responsive mt-2 col-md-12">
                        <x-submit-message />
                        @if (!$barcode_data->isEmpty())
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
                                                                                <button class="btn btn-sm btn-info rounded-3 m-1" title="Update" wire:click="editinfo({{$data->id}})">
                                                                                        <i class="bi bi-pencil-square"></i>
                                                                                </button>
                                                                                <button class="btn btn-sm btn-success rounded-3 m-1" title="Print QR Code" wire:click="generate_QRcode({{$data->id}})">
                                                                                        <i class="bi bi-qr-code"></i>
                                                                                </button>
                                                                        </td>
                                                                </tr>
                                                        @endforeach
                                                </tbody>
                                </table>
                        @else
                                <h1 class="text-center text-danger mt-5">No data available.</h1>
                        @endif
                        
                </div>

                <div class="col-md-12">
                        {{ $barcode_data->links("livewire::simple-bootstrap") }}
                </div>
        </div>
</section>