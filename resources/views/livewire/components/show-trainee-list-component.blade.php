<section>
        <div class="row">
                <div class="col-md-4 offset-md-8 mt-2">
                        <input type="text" class="form-control" wire:model.live="search" 
                        placeholder="Enter card number, barcode, category, owner, course...">
                </div>

                <div class="table-responsive mt-2 col-md-12">
                                @if (count($trainee_list_data) > 0)
                                        <table class="table table-striped table-hover">
                                                        <thead>
                                                                <tr>
                                                                        <th>Rank</th>
                                                                        <th>Lastname</th>
                                                                        <th>Firstname</th>
                                                                        <th>Middlename</th>
                                                                        <th>Suffix</th>
                                                                        <th>Course</th>
                                                                        <th>Code</th>
                                                                        <th>Course Type</th>
                                                                        <th>Company</th>
                                                                        <th>Bus</th>
                                                                        <th>Dorm</th>
                                                                        <th>Training Start Date</th>
                                                                        <th>Training End Date</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach ($trainee_list_data as $data)
                                                                        <tr>
                                                                                <td>{{ $data->rank }}</td>
                                                                                <td>{{ $data->lastname }}</td>
                                                                                <td>{{ $data->firstname }}</td>
                                                                                <td>{{ $data->middlename }}</td>
                                                                                <td>{{ $data->suffix }}</td>
                                                                                <td>{{ $data->course }}</td>
                                                                                <td>{{ $data->course_code }}</td>
                                                                                <td>{{ $data->course_type }}</td>
                                                                                <td>{{ $data->company }}</td>
                                                                                <td>{{ $data->bus }}</td>
                                                                                <td>{{ $data->dorm }}</td>
                                                                                <td>{{ $data->training_start_date}}</td>
                                                                                <td>{{ $data->training_end_date }}</td>
                                                                                
                                                                        </tr>
                                                                @endforeach
                                                        </tbody>
                                        </table>
                                @else 
                                        <h1 class="text-center text-danger mt-5">No data available.</h1>
                                @endif
                                
                </div>

                <div class="col-md-12">
                        {{ $trainee_list_data->links("livewire::simple-bootstrap") }}
                </div>
        </div>
</section>