<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function Customers(){
        return $this->hasMany(Customer::class);
    }


    public function Providers(){
        return $this->hasMany(Provider::class);
    }

    public function Categories(){
        return $this->hasMany(Category::class);
    }

    public function Units(){
        return $this->hasMany(Unit::class);
    }

    public function Products(){
        return $this->hasMany(Product::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
