<section>

    <div class="container">
            <h1>Employee Meal Tracker</h1>

            <div class="row bg-white mt-3">
                    <div class="col-md-4">
                            <livewire:components.create-employee-meal-log-component :autofocus="$autofocus"  />
                    </div>

                    <div class="col-md-8 mb-2 mt-3">
                        <div class="card shadow">
                                <div class="card-header">
                                        <h4>Logs</h4>
                                </div>
                                <div class="card-body">
                                        <livewire:components.show-employee-meal-log-component />
                                </div>
                        </div>
                    </div>
            </div>
    </div>

    

</section>
