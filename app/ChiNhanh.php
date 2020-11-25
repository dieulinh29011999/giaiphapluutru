<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiNhanh extends Model
{
    protected $table='chinhanh';
    public $timestamp = false;
    protected $fillable=['machinhanh','tenchinhanh','diachi'];
    public function phongban(){
        return $this->hasMany('App\PhongBan','id_chinhanh','id');
    }
}
