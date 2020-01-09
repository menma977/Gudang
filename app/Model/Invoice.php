<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'approved_user', 'code', 'description', 'debit', 'credit', 'total', 'over_due', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'product', 'route', 'store'
    ];

    public function Route()
    {
        return $this->hasOne(Route::class, 'id', 'route');
    }

    public function Store()
    {
        return $this->hasOne(Store::class, 'id', 'store');
    }

    public function Product()
    {
        return $this->hasOne(Product::class, 'id', 'product');
    }
}
