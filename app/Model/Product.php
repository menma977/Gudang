<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'name', 'quantity', 'price_buy', 'price_sell', 'margin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    public function Discount()
    {
        return $this->hasOne(Discount::class, 'product', 'id');
    }

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }
}
