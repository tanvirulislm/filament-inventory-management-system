<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'json'
    ];


    public function Tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Unit(){
        return $this->belongsTo(Unit::class);
    }
}
