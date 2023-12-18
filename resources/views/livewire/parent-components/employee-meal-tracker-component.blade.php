<section>

    <div class="container">
            <h1>Employee Meal Tracker</h1>

            <div class="row bg-white mt-3">
                    <div class="col-md-4">
                            <livewire:components.create-employee-meal-log-component :autofocus="$autofocus"  />
                            
                       

                            <div class="card mt-4">
                                <div class="card-header">
                                    Generate Report
                                </div>
                    
                                <div class="card-body">
                                    <form wire:submit.prevent="generateemployeemeal" id="generateemployeemeal">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="label">To</label>
                                                <input type="date" class="form-control text-dark flatpickr flatpickr-input active"
                                                    wire:model.defer="datefrom" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="label">To</label>
                                                <input type="date" class="form-control text-dark flatpickr flatpickr-input active"
                                                    wire:model.defer="dateto" required>
                                            </div>
                                        </div>
                                        {{-- <a target="_blank" href="{{ route('Emp-Meal-Tracker.employeemealreport', [ 'reporttype' => $urldata ]) }}"  class="btn btn-sm btn-danger">
                                                Export Pdf
                                            </a> --}}
                                            {{-- <a target="_blank" href="{{ route('Emp-Meal-Tracker.employeemealreport', ['datefrom' => $datefrom, 'dateto' => $dateto]) }}" class="btn btn-sm btn-danger">
                                                Export Pdf
                                            </a> --}}
                                        <input type="submit" class="btn btn-danger btn-sm mt-2" value="Generate">
                                    </form>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-8 mb-2">
                            <livewire:components.show-employee-meal-log-component />
                    </div>
            </div>
    </div>

</section>
