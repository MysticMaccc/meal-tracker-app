<div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <x-submit-message />
        </div>

        <div class="col-md-12">
            @if($warningMessage)
                <div class="alert alert-danger d-flex align-items-center mb-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <span>{{ $warningMessage }}</span>
                </div>
            @endif
            <label class="label">Scan Here</label>
            <input type="text" class="form-control" wire:model.live.debounce.250ms="barcode_value" autofocus>
            @error('barcode_value') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>

    @script
    <script>
        $wire.$watch('warningMessage', (value) => {
            if (value) {
                $el.querySelector('input[wire\\:model\\.live\\.debounce\\.250ms="barcode_value"]').focus();
                const alertEl = $el.querySelector('.alert-danger');
                if (alertEl) {
                    setTimeout(() => {
                        alertEl.style.display = 'none';
                    }, 3000);
                }
            }
        });
    </script>
    @endscript
</div>
