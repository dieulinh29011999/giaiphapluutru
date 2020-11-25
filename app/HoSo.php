<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    protected $table='hoso';
    public $timestamp = false;
    protected $fillable=['mahoso','tenhoso','ngaybanhanh','thoihanhoso','thoihanluutru','ngaytao',
    'tinhtrang','filedinhkem','noiluutrubandau','noinhan','mucdo','nguoitao',
    'id_vitri','id_loai','nguoiphutrach'];
    public function user(){
        return $this->belongsTo('App\User','nguoitao','id');
    }
    public function vitri(){
        return $this->belongsTo('App\ViTri','id_vitri','id');
    }
    public function loaihoso(){
        return $this->belongsTo('App\LoaiHoSo','id_loai','id');
    }
    public function phongban(){
        return $this->belongsTo('App\PhongBan','noiluutrubandau','id');
    }
}
