<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
    use HasFactory;
    public function assign_student()
    {
        return $this->hasMany(AssignStudent::class, 'class_id', 'id');
    }
}
