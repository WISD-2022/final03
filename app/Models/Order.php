<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);    #多對一
    }
    public function items()
    {
        return $this->hasMany(Items::class);     #一對多
    }
    protected $fillable=[
        'id',
        'users_id',
        'products_id',
        'quantity',
        'sum',
        'date',
        'status',
    ];
}
