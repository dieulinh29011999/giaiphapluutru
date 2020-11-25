<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    protected $table='phongban';
    public $timestamp = false;
    protected $fillable=['maphongban','tenphongban','id_chinhanh'];
    public function nhanvien(){
        return $this->hasMany('App\NhanVien','id_nhanvien','id');
    }
    public function chinhanh(){
        return $this->belongsTo('App\ChiNhanh','id_chinhanh','id');
    }
    public function loaiphong(){
        return $this->hasMany('App\LoaiPhong','id_phong','id');
    }
    public function hoso(){
        return $this->hasMany('App\HoSo','noiluutrubandau','id');
    }
}
