<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);          #多對一
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);    #多對多
    }
}
