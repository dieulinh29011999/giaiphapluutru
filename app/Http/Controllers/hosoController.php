<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoSo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\LoaiHoSo;
use App\PhongBan;
use App\User;

class hosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hoso = HoSo::orderBy('id','ASC')->paginate(5);
        return view('hoso.index', compact('hoso'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $key = $request->get('key');
        $tenloai = $request->get('tenloai');
        $tenphongban = $request->get('tenphongban');
        $tenuser = $request->get('tenuser');
        // $tenchinhanh = $request->get('tenchinhanh');
        $mucdo = $request->get('mucdo');
        // $mucdo = HoSo::orderBy('id','ASC')->get();
        $from = (($request->get('from')) ? Carbon::parse($request->get('from'))->format('Y-m-d') : NULL);
        $to = (($request->get('to')) ? Carbon::parse($request->get('to'))->format('Y-m-d') : NULL);
        $query = HoSo::with(['loaihoso','phongban','user']);
        if(isset($key)) {
            $query = $query->orwhere('mahoso','like','%'.$key.'%')
            ->orwhere('tenhoso','like','%'.$key.'%')
            ->orwhere('thoihanluutru','like','%'.$key.'%')
            ->orwhere('tinhtrang','like','%'.$key.'%')
            ->orwhere('mucdo','like','%'.$key.'%')
            ->orwhere('nguoiphutrach','like','%'.$key.'%')
            ->orwhere('noinhan','like','%'.$key.'%');
        }
        if(isset($tenphongban)){
            $query = $query->whereHas('phongban',function($query) use($tenphongban){
                $query->where("noiluutrubandau",$tenphongban);
            });
        }
        if(isset($tenloai)) {
            $query = $query->whereHas('loaihoso',function($query) use($tenloai)
            {
                $query->where("id_loai",$tenloai);
            });
        }
        // if(isset($tenchinhanh)) {
        //     $query = $query->whereHas('chinhanh',function($query) use($tenchinhanh)
        //     {
        //         $query->where("id_chinhanh",$tenchinhanh);
        //     });
        // }
        if(isset($tenuser)) {
            $query = $query->whereHas('user',function($query) use($tenuser)
            {
                $query->where("nguoitao",$tenuser);
            });
        }
        if(isset($from) && isset($to)) {
            $query = $query->whereBetween('ngaytao','', [$from." 00:00:00",$to." 23:59:59"]);
        }
        $hoso = $query->paginate(5);
        $querystringArray = $request->only(['key','tenloai','tenphongban','mucdo','tenuser','from','to']);
        $hoso->appends($querystringArray);
        $loaihoso = LoaiHoSo::orderBy('id','ASC')->get();
        $phongban =PhongBan::orderBy('id','ASC')->get();
        $user = User::orderBy('id','ASC')->get();
        return view('hoso.search',compact('hoso','loaihoso','phongban','user','key','tenloai','tenphongban','tenuser','mucdo','from','to'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $loaihoso = DB::table('loaihoso')->get();
        $user = DB::table('users')->get();
        $vitri = DB::table('vitri')->get();
        $phongban =DB::table('phongban')->get();
        $chinhanh = DB::table('chinhanh')->get();
        $nhanvien = DB::table('nhanvien')->get();
        return view('hoso.create',compact('loaihoso','user','vitri','phongban','chinhanh','nhanvien'));
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
            'mahoso'=>'required',
            'id_loai'=>'required',
        ],
        [
            'required'=>':attribute không được bỏ trống ',
            // 'unique'=>':attribute phải là duy nhất',
        ],
        [
            'mahoso'=>'Mã hồ sơ',
            'id_loai'=>'Loai hồ sơ',
        ]);

        $input = $request->all();
        $input['nguoitao'] = Auth::user()->id;
        $input['nguoitao'] = Auth::user()->id;
        if($request->hasFile('filedinhkem'))
            {
                $file = $request->file('filedinhkem');
                $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                if($file_extension == 'xlsx' || $file_extension == 'xls' || $file_extension == 'docx'|| $file_extension == 'pptx'){
                        
                        }
                        else return redirect()->back()->with('error','Chưa hỗ trợ định dạng file vừa upload.');

                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4).'_'.$file_name;
                while(file_exists('filedinhkem/'.$random_file_name)){
                    $random_file_name = str_random(4).'_'.$file_name;
                }
                $file->move('filedinhkem',$random_file_name);
                // $file_upload = new File();
                // $file_upload->name = $random_file_name;
                // $file_upload->link = 'posts/'.$random_file_name;
                // $file_upload->post_id = $filedinhkem->id;
                // $file_upload->save();
                $input['filedinhkem'] = 'filedinhkem/'.$random_file_name;
            } 
            else $input['filedinhkem']='';

       
        $hoso = HoSo::create($input);
        return redirect()->route('hoso.index')->with('success','Đã thêm thành công hồ sơ ');
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
        HoSo::find($id)->delete();
        return redirect()->route('hoso.index')
                        ->with('success','deleted successfully');
    }
}
