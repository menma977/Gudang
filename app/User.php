<?php

namespace App;

use App\Model\LedgerProduct;
use App\Model\Route;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'username', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token', 'delete'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Sales()
    {
        return $this->hasOne(LedgerProduct::class, 'user', 'id');
    }

    public function HeadStoreHouse()
    {
        return $this->hasOne(LedgerProduct::class, 'approved_storehouse', 'id');
    }

    public function Admin()
    {
        return $this->hasOne(LedgerProduct::class, 'approved_admin', 'id');
    }

    public function Route()
    {
        return $this->hasOne(Route::class, 'id', 'route');
    }
}
