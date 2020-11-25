<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!isset($row[0])){
            return  null;
        }
        return new User([
            'name'     => $row[0],
            'email'    => $row[1], 
            'danhso'   =>$row[2],
            'hoten'    =>$row[3],
            'password' => Hash::make('123456'),
        ]);
    }

}