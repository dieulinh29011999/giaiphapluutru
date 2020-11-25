<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use App\benhnhan;


class BenhnhanExport implements FromView, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct(string $id_benhvien, string $start_date, string $end_date)
    {   
        $this->id_benhvien = $id_benhvien;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function view(): View
    {
        return view('export.benhnhan', [
            'benhnhan' => benhnhan::where('id_benhvien', $this->id_benhvien)->
            whereBetween('ngaykham', [$this->start_date. ' 00:00:00', $this->end_date.' 23:59:59'])->get()
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
