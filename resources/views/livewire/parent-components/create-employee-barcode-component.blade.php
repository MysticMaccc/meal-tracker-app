<section>

    <div class="container">
            @if (session()->has('idtoedit'))
                <h1>Update Barcode</h1>        
            @else
                <h1>Create Barcode</h1>  
            @endif

            <!-- Dismissing alert -->

            <div class="row bg-white mt-3">

                    <div class="col-md-6 offset-md-3 mt-2">
                        <livewire:components.create-barcode-component />
                    </div>
            </div>
    </div>

</section>
