<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);    #多對一
    }
    public function item()
    {
        return $this->hasMany(Items::class);     #一對多
    }
}
