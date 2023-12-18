<?php

use App\Http\Controllers\QrcodeController;
use App\Livewire\Components\CreateBarcodeComponent;
use App\Livewire\Components\CreateEmployeeMealLogComponent;
use App\Livewire\Components\CreateTraineeMealLogComponent;
use App\Livewire\Components\CreateUserComponent;
use App\Livewire\Components\ShowBarcodeComponent;
use App\Livewire\Components\ShowEmployeeMealLogComponent;
use App\Livewire\Components\ShowTraineeListComponent;
use App\Livewire\Components\ShowTraineeMealLogComponent;
use App\Livewire\GenerateDocumentsComponent\EmployeeMealTrackerGenerateReport;
use App\Livewire\Components\ShowUserComponent;
use App\Livewire\Components\ShowUserTypeComponent;
use App\Livewire\Components\StoreUserTypeComponent;
use App\Livewire\GenerateDocumentsComponent\GenerateBarcodeCardComponent;
use App\Livewire\GenerateDocumentsComponent\GenerateQRCodeComponent;
use App\Livewire\HardwareComponents\QRCodeScannerComponent;
use App\Livewire\ParentComponents\CreateEmployeeBarcodeComponent;
use App\Livewire\ParentComponents\CreateUserTypeComponent;
use App\Livewire\ParentComponents\EmployeeBarcodeListComponent;
use App\Livewire\ParentComponents\EmployeeMealTrackerComponent;
use App\Livewire\ParentComponents\GenerateReportsComponent;
use App\Livewire\ParentComponents\IndexUserTypeComponent;
use App\Livewire\ParentComponents\ManageUserComponent;
use App\Livewire\ParentComponents\TraineeMealTrackerComponent;
use App\Livewire\ParentComponents\UserRegistrationComponent;
use App\Livewire\ParentComponents\WeeklyTraineeListComponent;
use App\Models\Qrcode;
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
            Route::get('generateReport' , [EmployeeMealTrackerGenerateReport::class, 'generatePDF'])->name('generateReport');
            // Route::get('Emp-Meal-Tracker/show' , EmployeeMealTrackerComponent::class)->name('Emp-Meal-Tracker.show');
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
            Route::get('update' , CreateEmployeeBarcodeComponent::class)->name('update');
    });

    Route::prefix('Generate-Reports')->as('Generate-Reports.')->group(function(){
        Route::get('show' , GenerateReportsComponent::class)->name('show'); 
    });

    Route::prefix('Manage-User')->as('Manage-User.')->group(function(){
            Route::get('index' , ManageUserComponent::class)->name('index');
            Route::get('create', UserRegistrationComponent::class)->name('create');
    });

    Route::prefix('Manage-User-Type')->as('Manage-User-Type.')->group(function(){
            Route::get('index' , IndexUserTypeComponent::class)->name('index');
            Route::get('create' , CreateUserTypeComponent::class)->name('create');
    });

    //Child Components
    //do not remove this routes because it will be used for component isolation
    Route::prefix('barcode')->as('barcode.')->group(function(){
        Route::get('show' , ShowBarcodeComponent::class)->name('show');
        Route::post('store' , CreateBarcodeComponent::class)->name('store');
    });

    Route::prefix('Emp-Meal-Log')->as('Emp-Meal-Log.')->group(function(){
        Route::get('show' , ShowEmployeeMealLogComponent::class)->name('show');
        Route::get('store' , CreateEmployeeMealLogComponent::class)->name('store');
    });

    Route::prefix('Trainee-List')->as('Trainee-List.')->group(function(){
        Route::get('show' , ShowTraineeListComponent::class)->name('show');
    });

    Route::prefix('Trainee-Meal-Log')->as('Trainee-Meal-Log.')->group(function(){
        Route::get('show' , ShowTraineeMealLogComponent::class)->name('show');
        Route::get('store' , CreateTraineeMealLogComponent::class)->name('store');
    });

    Route::prefix('User')->as('User.')->group(function () {
        Route::get('show' , ShowUserComponent::class)->name('show');
        Route::get('store' , CreateUserComponent::class)->name('store');
    });

    Route::prefix('User-type')->as('User-type.')->group(function(){
        Route::get('show' , ShowUserTypeComponent::class)->name('show');
        Route::get('store' , StoreUserTypeComponent::class)->name('store');
    });
    
    //Generated Documents Components
    Route::prefix('Generate-Document')->as('Document.')->group(function(){
        Route::get('barcodeCard' , [GenerateBarcodeCardComponent::class , 'generate_Barcode'])->name('barcodeCard');
        Route::get('QRCode' , [GenerateQRCodeComponent::class , 'generate_QRcode'])->name('QRCode');
    });
    
});
