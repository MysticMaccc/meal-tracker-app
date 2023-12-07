<section>
        <div class="row">
                
                <div class="col-md-4 offset-md-8 mt-2">
                        <input type="text" class="form-control" wire:model.live="search" 
                        placeholder="Enter card number, barcode, category, owner, course...">
                </div>

                <div class="table-responsive mt-2 col-md-12">
                                <table class="table table-striped table-hover">
                                        <thead>
                                                <tr>
                                                        <th>Rank</th>
                                                        <th>Name</th>
                                                        <th>Course</th>
                                                        <th>Course Type</th>
                                                        <th>Company</th>
                                                        <th>Bus</th>
                                                        <th>Dorm</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Meal Type</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($trainee_meal_data as $data)
                                                                <tr>
                                                                <td>{{ $data->trainee_list->rank }}</td>
                                                                <td>
                                                                        {{ $data->trainee_list->lastname }} {{ $data->trainee_list->firstname }}
                                                                        {{ $data->trainee_list->middlename }} {{ $data->trainee_list->suffix }}
                                                                </td>
                                                                <td>{{ $data->trainee_list->course }}</td>
                                                                <td>{{ $data->trainee_list->course_type }}</td>
                                                                <td>{{ $data->trainee_list->company }}</td>
                                                                <td>{{ $data->trainee_list->bus }}</td>
                                                                <td>{{ $data->trainee_list->dorm }}</td>
                                                                <td>{{ $data->date_scanned }}</td>
                                                                <td>{{ $data->time_scanned }}</td>
                                                                <td>{{ $data->meal_type->name }}</td>
                                                                </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                </div>

                <div class="col-md-12">
                        {{ $trainee_meal_data->links("livewire::simple-bootstrap") }}
                </div>
        </div>
</section>