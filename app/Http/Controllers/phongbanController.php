<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongBan;
use Illuminate\Support\Facades\DB;
use App\HoSo;

class phongbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phongban = PhongBan::orderBy('id', 'ASC')->paginate(5);
        return view('phongban.index', compact('phongban'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chinhanh = DB::table('chinhanh')->get();
        return view('phongban.create',compact('chinhanh'));
    }

    public function search(Request $request)
    {
        $hoso = DB::table('hoso')->get();
        $loaihoso = DB::table('loaihoso')->get();
        $vitri = DB::table('vitri')->get();
        // $noiluu  = DB::table('hoso')->get('noiluutrubandau');
        $phongban = DB::table('phongban')->get('id');
        // dd($hoso);
        // if($noiluu==$phongban){
        //      dd($hoso);
        // }
        return view('hoso.searchphongban',compact('hoso','phongban','loaihoso','vitri'));
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
            'maphongban'=>'required',
            'tenphongban'=>'required',
            'id_chinhanh'=>'required',
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            // 'unique'=>':attribute phải là duy nhất',
        ],
        [
            'maphongban'=>'Mã Phòng Ban',
            'tenphongban'=>'Tên Phòng Ban',
            'id_chinhanh'=>'Chi Nhánh',
        ]);
        $input = $request->all();
        $phongban = PhongBan::create($input);
        return redirect()->route('phongban.index')->with('success','Đã thêm thành công phòng ban ');
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
        PhongBan::find($id)->delete();
        return redirect()->route('phongban.index')
                        ->with('success','deleted successfully');
    }
}
