<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    public function company()
    {
        return $this->belongsTo(company::class,'comp_id');
    }
    public function sale()
    {
        return $this->hasMany(sale::class);
    }
}