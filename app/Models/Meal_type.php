<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_type extends Model
{
    use HasFactory;

    public function employee_meal_log()
    {
        return $this->hasMany(Employee_meal_log::class);
    }

    public function trainee_meal_log()
    {
        return $this->hasMany(Trainee_meal_log::class);
    }
}
