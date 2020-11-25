<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reset_password extends Model
{
    protected $table = 'password_resets';
    public $timestamp = false;

    protected $fillable = [
        'email',
        'token',
    ];
}
