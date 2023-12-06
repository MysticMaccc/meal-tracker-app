<section>

    <div class="container">
            <h1>Employee Barcode List</h1>

            <div class="row bg-white mt-3">
                    <div class="col-md-12 mt-2">
                            <a href="{{ route('Emp-Barcode-List.create') }}" class="btn btn-primary float-end" wire:navigate>Create</a>
                    </div>
                    <div class="col-md-12 table-responsive mt-2">
                        <livewire:components.show-barcode-component />
                    </div>
            </div>
    </div>

</section>
