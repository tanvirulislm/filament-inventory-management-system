<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    public function Tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function product(){
        return $this->hasMany(PurchaseProduct::class);
    }

    public function invoiceRecords(){
        return $this->hasMany(InvoiceRecord::class);
    }
}
