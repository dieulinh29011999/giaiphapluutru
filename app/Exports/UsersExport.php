<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    function __construct(string $start_date, string $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.user', [
            'users' => User::whereBetween('created_at', [$this->start_date. ' 00:00:00', $this->end_date.' 23:59:59'])->select('name',  'email', 'danhso', 'hoten')->get()
        ]);
    }
}
