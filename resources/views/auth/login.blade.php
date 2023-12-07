<x-guest-layout>
    
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <a href="../index.html"><img src="{{ asset('assets/images/meal-tracking-images/logo.png') }}" class="img-fluid rounded-3" alt="logo-icon"></a>
                                <h1 class="mb-1 fw-bold">Sign in</h1>
                                <span>
                                    Don’t have an account?
                                    <a href="{{ route('register') }}" class="ms-1" wire:navigate>Sign up</a>
                                </span>
                            </div>
                            
                            <x-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" >
                                </div>
                                
                                <!-- Checkbox -->
                                <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                    
                                    <div class="form-check">
                                        <label for="remember_me" class="form-check-label">
                                            <x-checkbox id="remember_me" name="remember" />
                                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                            <div>
                                                <a href="{{ route('password.request') }}" wire:navigate>Forgot your password?</a>
                                            </div>
                                    @endif
                                    
                                </div>

                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    
</x-guest-layout>
