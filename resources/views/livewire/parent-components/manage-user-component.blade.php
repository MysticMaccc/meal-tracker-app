<section>

        <div class="container">
                <h1>User Management</h1>

                <div class="row bg-white mt-3">
                        <div class="col-md-12 mx-2 my-4">
                                <a wire:click="clear_Sessions()" class="btn btn-md btn-success"><i
                                                class="bi bi-plus"></i> Create User</a>
                                <a href="{{route('Manage-User-Type.index')}}" class="btn btn-md btn-info"
                                        wire:navigate>Manage
                                        User Type</a>
                        </div>
                        <div class="col-md-12 table-responsive mt-2">
                                <livewire:components.show-user-component />
                        </div>
                </div>
        </div>

</section>