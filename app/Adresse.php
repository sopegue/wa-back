<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adress',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
