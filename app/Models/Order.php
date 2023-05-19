<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //Mass assignment
    protected $fillable = [
        'total',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'postal_code'
    ];
    //Relazione molti a molti
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot(['quantity']);
    }
}
