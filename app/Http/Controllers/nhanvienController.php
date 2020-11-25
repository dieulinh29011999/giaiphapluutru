<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use Illuminate\Support\Facades\DB;

class nhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nhanvien = NhanVien::orderBy('id', 'ASC')->paginate(5);
        return view('nhanvien.index', compact('nhanvien'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = DB::table('phongban')->get();
        $chucvu = DB::table('chucvu')->get();
        $user = DB::table('users')->get();
        return view('nhanvien.create',compact('phongban','chucvu','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'manhanvien'=>'required',
            'tennhanvien'=>'required',
            'id_phongban'=>'required',
            'id_chucvu'=>'required',
            // 'id_user'=>'required',
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            'unique'=>':attribute phải là duy nhất',
        ],
        [
            'manhanvien'=>'Mã Phòng Ban',
            'tennhanvien'=>'Tên Phòng Ban',
            'id_phongban'=>'Phòng Ban',
            'id_chucvu'=>'Chức Vụ',
            // 'id_user'=>'Tên tài khoản',
        ]);
        $input = $request->all();
        $nhanvien = NhanVien::create($input);
        return redirect()->route('nhanvien.index')->with('success','Đã thêm thành công nhân viên ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NhanVien::find($id)->delete();
        return redirect()->route('nhanvien.index')
                        ->with('success','deleted successfully');
    }
}
