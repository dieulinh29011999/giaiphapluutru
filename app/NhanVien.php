<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table='nhanvien';
    public $timestamp = false;
    protected $fillable=['manhanvien','tennhanvien','gioitinh','ngaysinh','sodienthoai','diachi','email','id_phongban','id_user','id_chucvu'];
    public function phongban(){
        return $this->belongsTo('App\PhongBan','id_phongban','id');
    }
    public function chucvu(){
        return $this->belongsTo('App\ChucVu','id_chucvu','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
