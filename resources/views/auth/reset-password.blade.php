<x-guest-layout>
    <section class="container d-flex flex-column vh-100">
        <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <img src="{{ asset('assets/images/meal-tracking-images/logo.png') }}" class="img-fluid rounded-3" alt="logo-icon">
                            <h1 class="mb-1 fw-bold">Reset Password</h1>
                            <p>Fill the form to reset your password.</p>
                        </div>
                        <!-- Form -->
                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.update') }}" class="row">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="col-md-12 mt-2">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-button class="btn btn-primary float-end">
                                    {{ __('Reset Password') }}
                                </x-button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>



