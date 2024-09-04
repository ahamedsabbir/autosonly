<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [] ;
    
// car have many images so one to many relation 
    public function images()
    {
        return $this->hasMany(CarsImage::class);
    }
}

