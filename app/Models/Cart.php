<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);           #多對一
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);    #多對多
    }

    protected $fillable = [
        'users_id',
        'quantity',
    ];
}
