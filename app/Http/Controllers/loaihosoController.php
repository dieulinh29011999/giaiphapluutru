<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiHoSo;

class loaihosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loaihoso = LoaiHoSo::orderBy('id', 'ASC')->paginate(5);
        return view('loaihoso.index', compact('loaihoso'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loaihoso.create');
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
            'maloai'=>'required',
            'tenloai'=>'required',
            // 'id_user'=>'required',
        ],
        [
            'required'=>':attribute không được bỏ trống ',
        ],
        [
            'maloai'=>'Mã Phòng Ban',
            'tenloai'=>'Tên Phòng Ban',
            // 'id_user'=>'Tên tài khoản',
        ]);
        $input = $request->all();
        $loaihoso = LoaiHoSo::create($input);
        return redirect()->route('loaihoso.index')->with('success','Đã thêm thành công loại hồ sơ ');
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
        LoaiHoSo::find($id)->delete();
        return redirect()->route('loaihoso.index')
                        ->with('success','deleted successfully');
    }
}
