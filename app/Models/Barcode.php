<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number' ,
        'barcode_value',
        'category_id' ,
        'category_type_id' ,
        'owner',
        'company',
        'start_date',
        'end_date' ,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function category_type()
    {
        return $this->belongsTo(Category_type::class);
    }

    public function employee_meal_log()
    {
        return $this->hasMany(Employee_meal_log::class);
    }

}
