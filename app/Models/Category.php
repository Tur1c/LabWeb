<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Category extends Model
{
    use HasFactory, UUID;

    protected $guarded = ["id"];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
