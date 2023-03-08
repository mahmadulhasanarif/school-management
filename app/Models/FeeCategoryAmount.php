<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    protected $fillable = ['fee_category_id', 'amount', 'class_id'];

    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class);
    }

    public function class()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
