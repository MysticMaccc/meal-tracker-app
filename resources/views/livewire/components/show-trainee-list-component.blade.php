<section>

    <input type="text" class="form-control" wire:model.live="search" placeholder="Enter card number, barcode, category, owner, course...">

    <div class="table-responsive mt-2">
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
    </div>

    <div>
            {{ $trainee_list_data->links("livewire::simple-bootstrap") }}
    </div>

</section>