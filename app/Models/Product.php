<?php

namespace App\Models;

use App\Events\ProductCreated;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'inventory'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if ($product->price < 0) {
                throw new Exception('Price cannot be negative');
            }
            if ($product->inventory < 0) {
                throw new Exception('Inventory cannot be negative');
            }
        });
    }

    protected $dispatchesEvents = [
        'created' => ProductCreated::class,
    ];
}