<?php
   
namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BacsiExport;
use App\Exports\BenhnhanExport;
use App\Imports\BacsiImport;
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('users.index');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        $start_date = date_format(date_create($request->input('start-date')),"Y-m-d");
        $end_date = date_format(date_create($request->input('end-date')),"Y-m-d");
        
        return Excel::download(new UsersExport($start_date, $end_date), 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
    public function importBS() 
    {
        Excel::import(new BacsiImport,request()->file('file'));
        return back();
    }
    public function exportBN(Request $request)
    {
        $start_date = date_format(date_create($request->input('start-datebn')),"Y-m-d");
        $end_date = date_format(date_create($request->input('end-datebn')),"Y-m-d");
        $id_benhvien = $request->id_benhvien;
        return Excel::download (new BenhnhanExport($id_benhvien,$start_date,$end_date),'benhnhan.xlsx');
        // return Excel::loadView (new BenhnhanExport($id_benhvien,$start_date,$end_date),'benhnhan.xlsx')->settitle('Patient Export')->mergeCells('A1:E1');
    }
    public function exportbs(Request $request)
    {
        $id_benhvien = $request->id_benhvien;
        return Excel::download ( new BacsiExport($id_benhvien),'bacsiexport.xlsx');
    }
}