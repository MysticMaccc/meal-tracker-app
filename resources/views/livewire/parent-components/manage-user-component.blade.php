<section>

    <div class="container">
            <h1>User Management</h1>

            <div class="row bg-white mt-3">
                    <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary float-end" wire:click="goToCreate">Create</button>
                    </div>
                    <div class="col-md-12 table-responsive mt-2">

                        @if ($component == 'show')
                                <livewire:components.show-user-component />
                        @elseif ($component == 'create')
                                <livewire:components.create-user-component />
                        @endif
                        
                    </div>
            </div>
    </div>

</section>
