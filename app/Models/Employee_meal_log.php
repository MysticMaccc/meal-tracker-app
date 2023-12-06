<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_meal_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode_id' ,
        'date_scanned' ,
        'time_scanned' ,
        'meal_type_id'
    ];

    public function barcode()
    {
        return $this->belongsTo(Barcode::class);
    }

    public function meal_type()
    {
        return $this->belongsTo(Meal_type::class);
    }
}
