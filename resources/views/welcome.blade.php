<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Meal Tracking System</title>

        {{-- custom bootstrap template --}}
        @include('partials.head')
        {{-- custom bootstrap template end --}}

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        

        <nav class="navbar navbar-expand-lg navbar-dark is-navbar-dark w-100">
            <div class="container px-0">
               <a class="navbar-brand" href="./index.html"><img src="{{ asset('assets/images/meal-tracking-images/logo.png') }}" width="30%" /></a>
               <!-- Button -->
               <button
                  class="navbar-toggler collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbar-default"
                  aria-controls="navbar-default"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                  >
               <span class="icon-bar top-bar mt-0"></span>
               <span class="icon-bar middle-bar"></span>
               <span class="icon-bar bottom-bar"></span>
               </button>
               <!-- Collapse -->
               <div class="collapse navbar-collapse" id="navbar-default">
                  
                  <div class="ms-auto mt-3 mt-lg-0">
                        @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary" wire:navigate>Dashboard</a>
                        @else
                                    <a href="{{ route('login') }}" class="btn btn-primary" wire:navigate>Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-info" wire:navigate>Register</a>
                                    @endif
                                @endauth
                        
                        @endif
                  </div>

               </div>
            </div>
         </nav>
            <!-- Page Content -->
            <main>
            <section class="py-lg-12 ">
                <div class="hero-img">
                    <div class="container px-4 px-lg-0 ">
                        <!-- Hero Section -->
                        <div class="row align-items-center">
                            <div class=" col-xl-5 col-md-12 py-6 py-xl-0">
                                <div class="mb-4 text-center text-xl-start px-md-8 px-lg-19 px-xl-0">
                                    <!-- Caption -->
                                    <h1 class="display-3 fw-bold mb-3 ls-sm ">
                                        <span class="text-primary">NETI</span>, Meal Tracking System.
                                    </h1>
                                    <p class="mb-6 lead pe-lg-6">
                                        NETI, the Meal Tracking System, is an innovative solution designed to streamline the 
                                        meal management process within a corporate or training environment.
                                    </p>
                                </div>
                            </div>
                            <div class="offset-xl-1 col-xl-6 col-md-12  d-flex justify-content-end">
                                <div class="">
                                    
                                     <img src="{{ asset('assets/images/meal-tracking-images/neti aerial.png') }}" class="img-fluid rounded-3 smooth-shadow-md">
        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>

            <!-- Footer -->
            <footer class="footer pt-8 pb-4">
                <div class="container">
                    <div class="row ">
                        <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                            <div class="text-center px-lg-18 mb-8">
                         <img src="./assets/images/geeksuilogo.svg" alt="" class="mb-3">
                         <p>&copy; 2023 NYK-Fil Maritime E-Training, Inc. All Rights Reserved.</p>
                         <p>Website developed by <span class="developer">NOC</span> with professionalism and expertise.</p>
                            
                        </div>
                        
                    </div>
                </div>
                </div>
            </footer>
            <!-- Footer End -->
        
        
        @stack('modals')
        @livewireScripts
    </body>
</html>
