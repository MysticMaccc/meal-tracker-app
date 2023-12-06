<section>

    <input type="text" class="form-control" wire:model.live="search" placeholder="Enter card number, name, company, meal type,...">

    <div class="table-responsive mt-2">
                <table class="table table-striped table-hover">
                            <thead>
                                    <tr>
                                            <th>Card Number</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Meal Type</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    @foreach ($employee_meal_log_data as $meal_data)
                                                <tr>
                                                    <td>{{ $meal_data->barcode->card_number }}</td>
                                                    <td>{{ $meal_data->barcode->owner }}</td>
                                                    <td>{{ $meal_data->barcode->company }}</td>
                                                    <td>{{ $meal_data->meal_type->name }}</td>
                                                    <td>{{ $meal_data->date_scanned }}</td>
                                                    <td>{{ $meal_data->time_scanned }}</td>
                                                </tr>
                                    @endforeach
                            </tbody>
                </table>
    </div>

    <div>
            {{ $employee_meal_log_data->links("livewire::simple-bootstrap") }}
    </div>

</section>