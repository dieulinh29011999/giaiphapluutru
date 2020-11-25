<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table='permissions';
    protected $fillable=['name','guard_name'];
}
