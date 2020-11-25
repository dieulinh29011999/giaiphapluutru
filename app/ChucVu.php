<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table='chucvu';
    public $timestamp = false;
    protected $fillable=['machucvu','tenchucvu'];
    public function nhanvien(){
        return $this->hasMany('App\NhanVien','id_nhanvien','id');
    }
}
