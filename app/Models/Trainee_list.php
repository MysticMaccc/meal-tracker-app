<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee_list extends Model
{
    use HasFactory;

    public function trainee_meal_log()
    {
            return $this->hasMany(Trainee_meal_log::class);
    }

    
}
