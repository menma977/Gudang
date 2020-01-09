<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'full_address', 'phone', 'number_ktp', 'ktp', 'ktp_and_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'route', 'user'
    ];

    public function Sales()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function Route()
    {
        return $this->hasOne(Route::class, 'id', 'route');
    }
}
