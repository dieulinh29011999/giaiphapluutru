<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiPhong;
use Illuminate\Support\Facades\DB;

class loaiphongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loaiphong = LoaiPhong::orderBy('id', 'ASC')->paginate(5);
        return view('loaiphong.index', compact('loaiphong'))
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
        $loaihoso = DB::table('loaihoso')->get();
        return view('loaiphong.create',compact('phongban','loaihoso'));
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
            'id_phong'=>'required',
            'id_loai'=>'required',
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            // 'unique'=>':attribute phải là duy nhất',
        ],
        [
            'id_phong'=>'Phòng Ban',
            'id_loai'=>'Loai hồ sơ',
        ]);
        $input = $request->all();
        $loaiphong = LoaiPhong::create($input);
        return redirect()->route('loaiphong.index')->with('success','Đã thêm thành công phòng ban ');
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
        LoaiPhong::find($id)->delete();
        return redirect()->route('loaiphong.index')
                        ->with('success','deleted successfully');
    }
}
