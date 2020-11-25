<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use App\bacsi;

class BacsiExport implements  FromView, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct(string $id_benhvien)
    {   
        $this->id_benhvien = $id_benhvien;
    }
    public function view(): View
    {
        return view('export.bacsi', [
            'bacsi' => bacsi::where('id_benhvien', $this->id_benhvien)->get()
        ]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) 
            {

            }
        ];
    }
}
