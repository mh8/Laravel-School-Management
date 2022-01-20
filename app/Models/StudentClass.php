<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    public function fee_category_amount()
    {
        return $this->hasMany(FeeCategoryAmount::class, 'class_id', 'id');
    }
    public function assign_student()
    {
        return $this->hasMany(AssignStudent::class, 'class_id', 'id');
    }
}
