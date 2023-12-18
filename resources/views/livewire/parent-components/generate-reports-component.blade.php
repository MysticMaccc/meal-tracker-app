<section>


    <x-loader/>
    


    <div class="container ">
            <h1>Generate Reports to PDF</h1>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card p-2 shadow">
                        <!-- tabs -->
                      <ul class="nav nav-tabs pt-2" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee Meal Logs</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trainee Meal Logs</a>
                      </li>
                      </ul>
                      
                      <div class="card-body">
                          <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-md-12">
                                    <form wire:submit="generatePDFEMT" action="">
                                        @csrf
                                        <div class="row">
                                        @error('datefrom') <small class="text-danger">** {{$message}} **</small> @enderror <br>
                                        @error('dateto') <small class="text-danger">** {{$message}} **</small> @enderror
                                        <div class="col-lg-6 gx-1">
                                            <h5>Date From: </h5>
                                            <input type="text" wire:model="datefrom" class="form-control flatpickr" placeholder="Select a date...">
                                        </div>
                                        <div class="col-lg-6 gx-1">
                                            <h5>Date To: </h5>
                                            <input type="text" wire:model="dateto" class="form-control flatpickr" placeholder="Select a date...">
                                        </div>
                                        <div class="col-lg-12 mt-2 d-grid gx-1">
                                            {{-- <a class="btn btn-danger" wire:click="generatePDFEMT" wire:loading.attr="disabled" href="{{ route('Emp-Meal-Tracker.generateReport') }}" target="_blank">Generate PDF</a> --}}
                                            <button class="btn btn-danger" wire:loading.remove type="submit">Generate PDF</a>
                                            <button class="btn btn-danger disabled" wire:loading>Generating PDF ...</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-md-12">
                                    <form wire:submit.prevent="generatePDFEMT" action="">
                                        @csrf
                                        <div class="row">
                                        @error('datefrom') <small class="text-danger">** {{$message}} **</small> @enderror <br>
                                        @error('dateto') <small class="text-danger">** {{$message}} **</small> @enderror
                                        <div class="col-lg-6 gx-1">
                                            <h5>Date From: </h5>
                                            <input type="date" wire:model="datefrom" class="form-control flatpickr" placeholder="Select a date...">
                                        </div>
                                        <div class="col-lg-6 gx-1">
                                            <h5>Date To: </h5>
                                            <input type="date" wire:model="dateto" class="form-control flatpickr" placeholder="Select a date...">
                                        </div>
                                        <div class="col-lg-12 mt-2 d-grid gx-1">
                                            {{-- <a class="btn btn-danger" wire:click="generatePDFEMT" wire:loading.attr="disabled" href="{{ route('Emp-Meal-Tracker.generateReport') }}" target="_blank">Generate PDF</a> --}}
                                            <button class="btn btn-danger" wire:loading.attr="disabled" type="submit">Generate PDF</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
    </div>

</section>