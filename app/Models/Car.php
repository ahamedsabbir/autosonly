<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [] ;
    
// car have many images/review/reservation so one to many relation 
    public function images()
    {
        return $this->hasMany(CarsImage::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}

