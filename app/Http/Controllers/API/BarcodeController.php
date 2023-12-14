<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Http\Requests\StoreBarcodeRequest;
use App\Http\Requests\UpdateBarcodeRequest;
use App\Http\Resources\BarcodeResource;
use App\Models\Employee_meal_log;
use Carbon\Carbon;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarcodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barcode $barcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarcodeRequest $request, Barcode $barcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {
        //
    }
}
