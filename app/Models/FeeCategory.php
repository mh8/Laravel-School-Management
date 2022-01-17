<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;
    public function fee_category_amount()
    {
        return $this->hasMany(FeeCategoryAmount::class, 'fee_category_id', 'id');
    }
}
