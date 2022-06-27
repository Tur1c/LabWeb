<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function cart_detail()
    {
        return $this->hasOne(CartDetail::class);
    }
}
