<section>

    <div class="row">
        
        <div class="col-md-4 offset-md-8 mt-2">
                <input type="text" class="form-control" wire:model.live="search" placeholder="Enter card number, name, company, meal type,...">
        </div>

        <div class="table-responsive mt-2 col-md-12">
                        @if (count($employee_meal_log_data) > 0)
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
                        @else
                                        <h1 class="text-center text-danger mt-5">No data available.</h1>
                        @endif
        </div>

        <div class="col-md-12">
                {{ $employee_meal_log_data->links("livewire::simple-bootstrap") }}
        </div>
    </div>

</section>