<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user
 * @property mixed description
 * @property mixed name
 */
class Route extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user'
    ];

    public function Sales()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
