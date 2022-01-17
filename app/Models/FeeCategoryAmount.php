<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class);
    }
    public function class()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
