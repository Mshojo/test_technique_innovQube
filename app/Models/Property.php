<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model

{
    protected $fillable = ['name', 'description', 'price_per_night']; // et les autres champs

}
