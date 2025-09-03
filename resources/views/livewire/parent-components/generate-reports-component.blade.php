<section>
    <x-loader />
    <div class="container mt-5 card text-center">

        <div class="card-header">
            <h1 class="fw-bold">Reports</h1>
        </div>

        <div class="card-header">
            <div class="d-flex justify-content-start">
                <div>
                    <h3>Select report type:</h3>
                    <select wire:model="employee_category" class="form-select" name="" id="">
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{strtoupper($item->name)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form wire:submit="generatePDFEMT" action="">
                @csrf
                <div class="row">
                    @error('datefrom')
                    <small class="text-danger">** {{ $message }} **</small>
                    @enderror <br>
                    @error('dateto')
                    <small class="text-danger">** {{ $message }} **</small>
                    @enderror
                    <div class="col-lg-6 gx-1">
                        <h5>Date From: </h5>
                        <input type="text" wire:model="datefrom" class="form-control flatpickr"
                            placeholder="Select a date...">
                    </div>
                    <div class="col-lg-6 gx-1">
                        <h5>Date To: </h5>
                        <input type="text" wire:model="dateto" class="form-control flatpickr"
                            placeholder="Select a date...">
                    </div>
                    <div class="col-lg-12 mt-2 d-grid gx-1"><button class="btn btn-danger" wire:loading.remove
                            type="submit">Generate Report</a>
                            <button class="btn btn-danger disabled" wire:loading>Generating PDF ...</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer text-body-secondary">
        </div>

    </div>

</section>