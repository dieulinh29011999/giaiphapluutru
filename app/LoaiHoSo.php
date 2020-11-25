<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiHoSo extends Model
{
    protected $table='loaihoso';
    public $timestamp = false;
    protected $fillable=['maloai','tenloai'];
    public function loaiphong(){
        return $this->hasMany('App\LoaiPhong','id_loai','id');
    }
    public function hoso(){
        return $this->hasMany('App\HoSo','id_loai','id');
    }
}
