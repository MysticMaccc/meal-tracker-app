<x-guest-layout>
    <section class="container d-flex flex-column vh-100">
        <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="{{ asset('assets/images/meal-tracking-images/logo.png') }}" class="img-fluid rounded" alt="logo"></a>
                            <h1 class="mb-1 fw-bold">Sign up</h1>
                            <span>
                                Already have an account?
                                <a href="{{ route('login') }}" class="ms-1" wire:navigate>Sign in</a>
                            </span>
                        </div>
                        <!-- Form -->
                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('register') }}" class="row">
                            @csrf

                            <div class="col-md-12">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="col-md-12 mt-2">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="col-md-12">
                                <x-button class="btn btn-primary float-end mt-1">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
