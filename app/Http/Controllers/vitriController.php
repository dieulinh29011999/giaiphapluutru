<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViTri;

class vitriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vitri = ViTri::orderBy('id','ASC')->paginate(5);
        return view('vitri.index', compact('vitri'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vitri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'mavitri'=>'required',
            'sotu'=>'required',
            'soke'=>'required',
            'songan'=>'required'
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            'unique'=>':attribute phải là duy nhất',
        ],
        [
            'mavitri'=>'mã chức vụ',
            'sotu'=>'tên chi chức vụ',
            'soke'=>'số kệ',
            'songan'=>'số ngăn',
        ]
        );
        $input = $request->all();
        $vitri = vitri::create($input);
        return redirect()->route('vitri.index')->with('success','Đã thêm thành công chức vụ ');
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
        ViTri::find($id)->delete();
        return redirect()->route('vitri.index')
                        ->with('success','deleted successfully');
    }
}
