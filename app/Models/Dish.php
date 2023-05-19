<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    //Mass assignment
    protected $fillable = [
        'name',
        'img',
        'description',
        'price',
        'is_visible',
        'restaurant_id'
    ];
    //Relazione uno a molti
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    //Relazione molti a molti
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
