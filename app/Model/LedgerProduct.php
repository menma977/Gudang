<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LedgerProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'income', 'outcome', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user', 'approved_admin', 'approved_storehouse'
    ];

    public function Sales()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function HeadStoreHouse()
    {
        return $this->hasOne(User::class, 'id', 'approved_storehouse');
    }

    public function Admin()
    {
        return $this->hasOne(User::class, 'id', 'approved_admin');
    }
}
