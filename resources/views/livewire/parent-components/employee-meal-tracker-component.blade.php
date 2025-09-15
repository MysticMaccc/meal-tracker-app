<section class="bg-light min-vh-100">
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center py-4">
                        <h1 class="display-5 fw-bold text-primary mb-2">
                            <i class="bi bi-clipboard-data me-2"></i>Employee Meal Tracker
                        </h1>
                        <p class="text-muted mb-0">Monitor and track employee meal activities in real-time</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row g-4">
            <!-- Create Meal Log Card -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 max-h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-plus-circle me-2"></i>Add Meal Entry
                        </h5>
                    </div>
                    <div class="card-body">
                        <livewire:components.create-employee-meal-log-component :autofocus="$autofocus" />
                    </div>
                </div>
            </div>

            <!-- Show Meal Logs Card -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-table me-2"></i>Meal Activity Log
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <livewire:components.show-employee-meal-log-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>