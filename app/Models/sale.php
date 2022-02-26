<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    public function medicine()
    {
        return $this->belongsTo(medicine::class,'med_id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class,'cust_id');
    }
}