<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee_meal_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'trainee_list_id',
        'trainee_id',
        'date_scanned',
        'time_scanned',
        'meal_type_id'
    ];

    public function trainee_list()
    {
            return $this->belongsTo(Trainee_list::class);
    }

    public function meal_type()
    {
            return $this->belongsTo(Meal_type::class);
    }

}
