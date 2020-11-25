<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChucVu;

class chucvuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chucvu = ChucVu::orderBy('id', 'ASC')->paginate(5);
        return view('chucvu.index', compact('chucvu'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chucvu.create');
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
            'machucvu'=>'required',
            'tenchucvu'=>'required'
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            'unique'=>':attribute phải là duy nhất',
        ],
        [
            'machucvu'=>'mã chức vụ',
            'tenchucvu'=>'tên chi chức vụ',
        ]
        );
        $input = $request->all();
        $chucvu = ChucVu::create($input);
        return redirect()->route('chucvu.index')->with('success','Đã thêm thành công chức vụ ');
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
        ChucVu::find($id)->delete();
        return redirect()->route('chucvu.index')
                        ->with('success','deleted successfully');
    }
}
