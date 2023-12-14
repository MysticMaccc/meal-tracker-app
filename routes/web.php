<?php

use App\Livewire\Components\CreateBarcodeComponent;
use App\Livewire\Components\CreateEmployeeMealLogComponent;
use App\Livewire\Components\CreateTraineeMealLogComponent;
use App\Livewire\Components\CreateUserComponent;
use App\Livewire\Components\ShowBarcodeComponent;
use App\Livewire\Components\ShowEmployeeMealLogComponent;
use App\Livewire\Components\ShowTraineeListComponent;
use App\Livewire\Components\ShowTraineeMealLogComponent;
use App\Livewire\Components\ShowUserComponent;
use App\Livewire\GenerateDocumentsComponent\GenerateBarcodeCardComponent;
use App\Livewire\GenerateDocumentsComponent\GenerateQRCodeComponent;
use App\Livewire\HardwareComponents\QRCodeScannerComponent;
use App\Livewire\ParentComponents\CreateEmployeeBarcodeComponent;
use App\Livewire\ParentComponents\EmployeeBarcodeListComponent;
use App\Livewire\ParentComponents\EmployeeMealTrackerComponent;
use App\Livewire\ParentComponents\ManageUserComponent;
use App\Livewire\ParentComponents\TraineeMealTrackerComponent;
use App\Livewire\ParentComponents\WeeklyTraineeListComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //parent component
    Route::prefix('Emp-Meal-Tracker')->as('Emp-Meal-Tracker.')->group(function(){
            Route::get('index' , EmployeeMealTrackerComponent::class)->name('index');
    });

    Route::prefix('Trainee-Meal-Tracker')->as('Trainee-Meal-Tracker.')->group(function(){
            Route::get('index' , TraineeMealTrackerComponent::class)->name('index');
    });

    Route::prefix('Weekly-Trainee-List')->as('Weekly-Trainee-List.')->group(function(){
            Route::get('index' , WeeklyTraineeListComponent::class)->name('index');
    });

    Route::prefix('Emp-Barcode-List')->as('Emp-Barcode-List.')->group(function(){
            Route::get('index' , EmployeeBarcodeListComponent::class)->name('index');
            Route::get('create' , CreateEmployeeBarcodeComponent::class)->name('create');
    });

    Route::prefix('Manage-User')->as('Manage-User.')->group(function(){
            Route::get('index' , ManageUserComponent::class)->name('index');
    });


    //Child Components
    //do not remove this routes because it will be used for component isolation
    Route::prefix('barcode')->as('barcode.')->group(function(){
        Route::get('show' , ShowBarcodeComponent::class)->name('show');
        Route::post('create' , CreateBarcodeComponent::class)->name('create');
    });

    Route::prefix('Emp-Meal-Log')->as('Emp-Meal-Log.')->group(function(){
        Route::get('show' , ShowEmployeeMealLogComponent::class)->name('show');
        Route::get('create' , CreateEmployeeMealLogComponent::class)->name('create');
    });

    Route::prefix('Trainee-List')->as('Trainee-List.')->group(function(){
        Route::get('show' , ShowTraineeListComponent::class)->name('show');
    });

    Route::prefix('Trainee-Meal-Log')->as('Trainee-Meal-Log.')->group(function(){
        Route::get('show' , ShowTraineeMealLogComponent::class)->name('show');
        Route::get('create' , CreateTraineeMealLogComponent::class)->name('create');
    });

    Route::prefix('User')->as('User.')->group(function () {
        Route::get('show' , ShowUserComponent::class)->name('show');
        Route::get('create' , CreateUserComponent::class)->name('create');
    });
    
    //Generated Documents Components
    Route::prefix('Generate-Document')->as('Document.')->group(function(){
        Route::get('barcodeCard' , [GenerateBarcodeCardComponent::class , 'generate_Barcode'])->name('barcodeCard');
        Route::get('QRCode' , [GenerateQRCodeComponent::class , 'generate_QRcode'])->name('QRCode');
    });
    
});
