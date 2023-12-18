<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee_meal_log;
use App\Http\Requests\StoreEmployee_meal_logRequest;
use App\Http\Requests\UpdateEmployee_meal_logRequest;
use App\Models\Barcode;
use Carbon\Carbon;

class EmployeeMealLogController extends Controller
{
    public function store($barcodeValue)
    {
        $barcode_data = Barcode::where('barcode_value' , $barcodeValue)->first();

        if(!$barcode_data){
                return response()->json(['message' => 'Barcode not found'], 404);
        }

        try 
        {
            $check_meal_log = Employee_meal_log::where('barcode_id', $barcode_data->id)
                ->where('meal_type_id', $this->meal_type())
                ->where('date_scanned', date('Y-m-d'))
                ->get();

            if ($check_meal_log->isEmpty()) 
            {
                // Meal log does not exist, create a new entry
                $create_meal_log = Employee_meal_log::create([
                    'barcode_id' => $barcode_data->id,
                    'date_scanned' => date('Y-m-d'),
                    'time_scanned' => now()->toTimeString(),
                    'meal_type_id' => $this->meal_type()
                ]);
                
                return response()->json(['message' => 'Meal log recorded for '.$create_meal_log->barcode->owner.' !'], 200);
            } 
            else 
            {
                // Meal log already exists, display an error message
                return response()->json(['message' => 'Meal log already exist!'], 404);
            }
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'An error occurred while processing the request.'], 500);
        }
        
    }

    function meal_type()
    {
        $currentTime = Carbon::now();

        if ($currentTime->isBetween('05:00:00', '10:00:00')) {
            return '1';
        } elseif ($currentTime->isBetween('10:00:01', '14:00:00')) {
            return '2';
        } elseif ($currentTime->isBetween('14:00:01', '22:00:00')) {
            return '3';
        }

        return null;
    }


}
