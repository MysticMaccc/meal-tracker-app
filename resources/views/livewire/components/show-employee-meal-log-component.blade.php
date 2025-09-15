<section>
    <!-- Advanced Filters Section -->
    <div class="p-3 bg-light border-bottom">
        <div class="row g-3">
            <!-- Search Input -->
            <div class="col-lg-3 col-md-6">
                <label class="form-label fw-semibold text-dark">
                    <i class="bi bi-search me-1"></i>Quick Search
                </label>
                <input type="text" class="form-control" wire:model.live="search"
                    placeholder="Search by name, card, company...">
            </div>

            <!-- Meal Type Filter -->
            <div class="col-lg-2 col-md-6">
                <label class="form-label fw-semibold text-dark">
                    <i class="bi bi-cup-straw me-1"></i>Meal Type
                </label>
                <select class="form-select" wire:model.live="mealTypeFilter">
                    <option value="">All Types</option>
                    @foreach($meal_types as $meal_type)
                    <option value="{{ $meal_type->id }}">{{ $meal_type->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date From -->
            <div class="col-lg-2 col-md-6">
                <label class="form-label fw-semibold text-dark">
                    <i class="bi bi-calendar-event me-1"></i>Date From
                </label>
                <input type="date" class="form-control" wire:model.live="dateFrom">
            </div>

            <!-- Date To -->
            <div class="col-lg-2 col-md-6">
                <label class="form-label fw-semibold text-dark">
                    <i class="bi bi-calendar-check me-1"></i>Date To
                </label>
                <input type="date" class="form-control" wire:model.live="dateTo">
            </div>

            <!-- Clear Filters Button -->
            <div class="col-lg-1 col-md-6 d-flex align-items-end">
                <button type="button" class="btn btn-outline-secondary w-100" wire:click="clearFilters">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Results Summary -->
    <div class="p-3 bg-info bg-opacity-10 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-dark fw-semibold">
                <i class="bi bi-list-ul me-1"></i>
                Showing {{ $employee_meal_log_data->count() }} of {{ $employee_meal_log_data->total() }} records
            </span>
            <small class="text-muted">
                <i class="bi bi-arrow-clockwise me-1"></i>Auto-refreshing every 30 seconds
            </small>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-responsive" wire:poll.30s.keep-alive>
        @if (count($employee_meal_log_data) > 0)
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="border-0">
                        <i class="bi bi-credit-card me-1"></i>Card Number
                    </th>
                    <th class="border-0">
                        <i class="bi bi-person me-1"></i>Employee Name
                    </th>
                    <th class="border-0">
                        <i class="bi bi-building me-1"></i>Company
                    </th>
                    <th class="border-0">
                        <i class="bi bi-cup-straw me-1"></i>Meal Type
                    </th>
                    <th class="border-0">
                        <i class="bi bi-calendar-event me-1"></i>Date
                    </th>
                    <th class="border-0">
                        <i class="bi bi-clock me-1"></i>Time
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee_meal_log_data as $meal_data)
                <tr class="border-bottom">
                    <td class="fw-semibold text-primary">{{ $meal_data->barcode->card_number }}</td>
                    <td>{{ $meal_data->barcode->owner }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $meal_data->barcode->company }}</span>
                    </td>
                    <td>
                        <span class="badge bg-success">{{ $meal_data->meal_type->name }}</span>
                    </td>
                    <td>
                        <i class="bi bi-calendar3 me-1 text-muted"></i>
                        {{ \Carbon\Carbon::parse($meal_data->date_scanned)->format('M d, Y') }}
                    </td>
                    <td>
                        <i class="bi bi-clock me-1 text-muted"></i>
                        {{ \Carbon\Carbon::parse($meal_data->time_scanned)->format('h:i A') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="bi bi-inbox display-1 text-muted"></i>
            </div>
            <h4 class="text-muted">No meal records found</h4>
            <p class="text-muted">Try adjusting your search criteria or add new meal entries.</p>
            <button type="button" class="btn btn-primary" wire:click="clearFilters">
                <i class="bi bi-arrow-clockwise me-1"></i>Clear All Filters
            </button>
        </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($employee_meal_log_data->hasPages())
    <div class="p-3 border-top bg-light">
        {{ $employee_meal_log_data->links("livewire::simple-bootstrap") }}
    </div>
    @endif
</section>