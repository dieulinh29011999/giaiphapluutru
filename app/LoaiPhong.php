<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    protected $table='loaiphong';
    public $timestamp = false;
    protected $fillable=['id_loai','id_phong'];
    public function loaihoso(){
        return $this->belongsTo('App\LoaiHoSo','id_loai','id');
    }
    public function phongban(){
        return $this->belongsTo('App\PhongBan','id_phong','id');
    }
}
