<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'item');
    }
}
