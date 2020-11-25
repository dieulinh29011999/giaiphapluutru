<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
class permissionController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
        $key = $request->get('key');
        if($key)
        {
            $permissions = Permission::where('id','like','%'.$key.'%')
            ->orwhere('name','like','%'.$key.'%')->paginate(10); // code phan trang
            $permissions->appends(['key'=>$key]);
        }
        else
        {
            $permissions= Permission::orderBy('id', 'ASC')->paginate(10);
        }
        return view('permissions.index',compact('permissions'))
        ->with('i',($request->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        $permissions = Permission::pluck('name','name')->all(); //lay het toan bo cot name
        return view('permissions.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);
        $input = $request->all();
        $permissions =Permission::create($input);

        return redirect()->route('permissions.index')
        ->with('success','permission created successfully');
    }
    // public function show($id)
    // {
    //     $permissions = Permission::find($id);
    //     return view('permissions.show',compact('permissions'));
    // }
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('permissions.edit',compact('permissions'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);
        $input = $request->all();
        $permissions = Permission::find($id);
        $permissions->update($input);
        return redirect()->route('permissions.index')
        ->with('success','Permission updated successfully');
    }

    public function show($id)
    {
        $permissions = Permission::find($id);
        return view('permissions.show',compact('permissions'));
    }
    public function destroy($id)
    {

        Permission::find($id)->delete();
        return redirect()->route('permissions.index')
        ->with('success','permission deleted successfully');
    }
}
