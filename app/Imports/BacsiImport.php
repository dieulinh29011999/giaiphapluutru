<?php

namespace App\Imports;

use App\bacsi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class BacsiImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        if(!isset($row[0])){
            return  null;
        }
        return new bacsi([
            'tenbacsi'     => $row[0],
            'hocvi'    => $row[1], 
            'id_benhvien'   =>$row[2],
            'id_chuyenkhoa'    =>$row[3],
        ]);
    }
}
