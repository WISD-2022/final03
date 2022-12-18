<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function admin(){
        return $this->belongsTo(Admin::class);         #多對一
    }
    public function user(){
        return $this->belongsToMany(User::class);      #多對多
    }
    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
    public function item()
    {
        return $this->belongsToMany(Items::class);
    }
}
