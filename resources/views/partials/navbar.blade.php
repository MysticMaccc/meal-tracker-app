<nav class="navbar navbar-expand-lg">
	<div class="container-fluid px-0">
		{{-- <a class="navbar-brand" href="@@webRoot/index.html"><img src="@@webRoot/assets/images/brand/logo/logo.svg"
				alt="" class="" ></a> --}}
		<!-- Mobile view nav wrap -->

<div class="ms-auto d-flex align-items-center order-lg-3">
	
			 <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
				
				 {{-- profile dropdown --}}
				 <li class="dropdown ms-2 d-inline-block position-static">
					 <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
						 aria-expanded="false">
						 <div class="avatar avatar-md avatar-indicators avatar-online">
							 <img alt="avatar" src="{{asset('assets/images/avatar/avatar.jpg')}}"
								 class="rounded-circle" >
						 </div>
					 </a>
					 <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
						 <div class="dropdown-item">
							 <div class="d-flex">
								 <div class="avatar avatar-md avatar-indicators avatar-online">
									 <img alt="avatar" src="{{asset('assets/images/avatar/avatar.jpg')}}"
										 class="rounded-circle" >
								 </div>
								 <div class="ms-3 lh-1">
									 <h5 class="mb-1">{{ Auth::user()->name }}</h5>
									 <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
								 </div>
							 </div>
						 </div>
						 <div class="dropdown-divider"></div>
						 <ul class="list-unstyled">
							
							<li>
									<a class="dropdown-item" href="{{ route('profile.show') }}" wire:navigate>
										Profile
									</a>
							</li>
							<li>
								@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
									<a class="dropdown-item" href="{{ route('api-tokens.index') }}" wire:navigate>
										<span class="badge-dot bg-success me-2"></span>{{ __('API Tokens') }}
									</a>
								@endif
							</li>
							<li>
								<!-- Authentication -->
								<form method="POST" action="{{ route('logout') }}" x-data>
									@csrf
	
									<x-dropdown-link href="{{ route('logout') }}"
												@click.prevent="$root.submit();" >
										{{ __('Log Out') }}
									</x-dropdown-link>
								</form>
							</li>

						 </ul>
						 
					 </div>
				 </li>
				 {{-- profile dropdown end --}}

			 </ul>

			 </div>
			 <div>
				<!-- Button -->
				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="icon-bar top-bar mt-0"></span>
				<span class="icon-bar middle-bar"></span>
				<span class="icon-bar bottom-bar"></span>
				</button>
				</div>

		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbar-default">
			<ul class="navbar-nav">

				<li class="nav-item">
						<a href="{{ route('Emp-Meal-Tracker.index') }}" class="nav-link" wire:navigate>
							Employee Meal Tracker
						</a>
				</li>
				{{-- <li class="nav-item">
						<a href="{{ route('Trainee-Meal-Tracker.index') }}" class="nav-link" wire:navigate>
							Trainee Meal Tracker
						</a>
				</li> --}}
				{{-- <li class="nav-item">
						<a href="{{ route('Weekly-Trainee-List.index') }}" class="nav-link" wire:navigate>
							Weekly Trainee List
						</a>
				</li> --}}
				<li class="nav-item">
						<a href="{{ route('Emp-Barcode-List.index') }}" class="nav-link" wire:navigate>
							Employee Barcode List
						</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('Generate-Reports.show') }}" wire:navigate>
						Reports
					</a>
        </li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarLanding" data-bs-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Settings
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarLanding">
						<li>
							<h4 class="dropdown-header">Settings</h4>
						</li>
				
						<li>
							<a href="{{route('Manage-User.index')}}" class="dropdown-item d-flex justify-content-between" wire:navigate>
								User Management
							</a>
						</li>
					</ul>
				</li>
				
			</ul>

		</div>

	</div>
</nav>


{{-- <li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbarLanding" data-bs-toggle="dropdown"
		aria-haspopup="true" aria-expanded="false">
		Landings
	</a>
	<ul class="dropdown-menu" aria-labelledby="navbarLanding">
		<li>
			<h4 class="dropdown-header">Landings</h4>
		</li>

		<li>
			<a href="@@webRoot/pages/landings/landing-education.html"
				class="dropdown-item d-flex justify-content-between">
				Education <span class="badge bg-primary ms-1">New</span>
			</a>
		</li>
		<li>
			<a href="@@webRoot/pages/landings/home-academy.html"
				class="dropdown-item d-flex justify-content-between">
				Home Academy
			</a>
		</li>
		<li>
			<a href="@@webRoot/pages/landings/landing-courses.html" class="dropdown-item">
				Courses
			</a>
		</li>
		<li>
			<a href="@@webRoot/pages/landings/course-lead.html" class="dropdown-item">
				Lead Course
			</a>
		</li>
		<li>
			<a href="@@webRoot/pages/landings/request-access.html" class="dropdown-item">
				Request Access
			</a>
		</li>
		<li>
			<a href="@@webRoot/pages/landings/landing-sass.html" class="dropdown-item">
				SaaS
			</a>
		</li>


		<li>
			<a href="@@webRoot/pages/landings/landing-job.html"
				class="dropdown-item d-flex justify-content-between">
				Job Listing
			</a>
		</li>


	</ul>
</li> --}}