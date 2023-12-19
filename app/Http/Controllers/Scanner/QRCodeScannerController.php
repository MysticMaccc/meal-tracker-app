<?php

namespace App\Http\Controllers\Scanner;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QRCodeScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scanner.QRCode-Scanner');
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
    public function store(Request $request)
    {
        // Get the scanned value from the request
        $scannedValue = $request->input('content');

        // Dump and die to see the scanned value in the console
        dd($scannedValue);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
