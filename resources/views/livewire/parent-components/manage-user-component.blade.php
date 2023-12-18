<section>

    <div class="container">
            <h1>User Management</h1>

            <div class="row bg-white mt-3">
                    <div class="col-md-12 mt-2">
                            
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle float-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-sliders"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a wire:click="clear_Sessions()" class="dropdown-item" >Create User</a></li>
                                  <li><a href="{{route('Manage-User-Type.index')}}" class="dropdown-item" wire:navigate>Manage User Type</a></li>
                                </ul>
                              </div>

                    </div>
                    <div class="col-md-12 table-responsive mt-2">
                                <livewire:components.show-user-component />
                    </div>
            </div>
    </div>

</section>
