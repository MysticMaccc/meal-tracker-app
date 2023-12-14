<?php

use App\Http\Controllers\API\BarcodeController;
use App\Http\Controllers\API\EmployeeMealLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
// */

// no authentication yet!!!!
Route::get('emp_meal_log/{barcode_value}' , [EmployeeMealLogController::class , 'store']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});