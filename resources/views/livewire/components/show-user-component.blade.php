<section>
    <div class="row">
            <div class="col-md-6 offset-md-6 mt-2">
                    <input type="text" class="form-control" wire:model.live="search" 
                    placeholder="Enter card number, barcode, category, owner, course...">
            </div>

            <div class="table-responsive mt-2 col-md-12">
                    <x-submit-message />
                    @if (!$user_data->isEmpty())
                            <table class="table table-striped table-hover">
                                            <thead>
                                                    <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>User Type</th>
                                                            <th>Created At</th>
                                                            <th>Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($user_data as $data)
                                                            <tr>
                                                                <td>{{$data->name}}</td>
                                                                <td>{{$data->email}}</td>
                                                                <td>{{$data->user_type->name}}</td>
                                                                <td>{{$data->created_at}}</td>
                                                                <td>
                                                                     <button class="btn btn-sm btn-success" title="edit" wire:click="goToEdit({{$data->id}})">
                                                                        <i class="bi bi-pencil-square"></i>
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
                    {{ $user_data->links("livewire::simple-bootstrap") }}
            </div>
    </div>
</section>