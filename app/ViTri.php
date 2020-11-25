<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViTri extends Model
{
    protected $table='vitri';
    public $timestamp = false;
    protected $fillable=['mavitri','soday','sotu','soke','songan'];
    public function hoso(){
        return $this->hasOne('App\HoSo','id_vitri','id');
    }
}
