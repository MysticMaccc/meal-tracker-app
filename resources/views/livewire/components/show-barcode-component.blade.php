<section>

        <input type="text" class="form-control" wire:model.live="search" placeholder="Enter card number, barcode, category, owner, course...">

        <div class="table-responsive mt-2">
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
                                                    </tr>
                                        @endforeach
                                </tbody>
                    </table>
        </div>

        <div>
                {{ $barcode_data->links("livewire::simple-bootstrap") }}
        </div>

</section>