<?php

namespace App\Http\Controllers;

use App\User;
use App\benhnhan;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Validator;
use App\Charts\BenhNhanChart;
use Charts;
use DB;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('hoso.search');
    }

    public function profile()
    {
        $profile= User::find(Auth::user()->id);
        $roles=Role::pluck('name','name')->all();
        $userRole=$profile->roles->pluck('name','name')->all();
        return view('auth.profile',compact('profile','roles','userRole'));
        
    }
    public function profileUpdate(Request $request)
    {
        $profile= User::find(Auth::user()->id);
        $this->validate($request,[
            'tenuser'=>'required',
            'email'=>'required',
            'mauser'=>'required',
        ]);
        $profile->tenuser=$request->input('tenuser');
        $profile->email=$request->input('email');
        $profile->mauser=$request->input('mauser');
        if(!empty($request->input('password')))
        {
            $profile->password=Hash::make($request->input('password'));
        }
        else
        {
            $profile=array_except($profile, array('password'));
        }
        $profile->save();
        return redirect()->back()->with('success', 'update successfully');
    }
}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


//     public function index()
//     {
//         $count_user = User::count();
//         $count_choray = benhnhan::whereHas('benhvien', function($q) {
//             $q->where('tenbenhvien', 'Bệnh viện Chợ Rẫy');
//         })->count();
//         $count_tudu = benhnhan::whereHas('benhvien', function($q) {
//             $q->where('tenbenhvien', 'Bệnh viện Từ Dũ');
//         })->count();
//         $borderColors = [
//             "rgba(255, 99, 132, 1.0)",
//             "rgba(22,160,133, 1.0)",
//             "rgba(255, 205, 86, 1.0)",
//             "rgba(51,105,232, 1.0)",
//             "rgba(244,67,54, 1.0)",
//             "rgba(34,198,246, 1.0)",
//             "rgba(153, 102, 255, 1.0)",
//             "rgba(255, 159, 64, 1.0)",
//             "rgba(233,30,99, 1.0)",
//             "rgba(205,220,57, 1.0)",
//             "rgba(255,255,0,0.3)",
//             "rgba(0,0,255,0.3)",
//         ];
//         $fillColors = [
//             "rgba(255, 99, 132, 0.2)",
//             "rgba(22,160,133, 0.2)",
//             "rgba(255, 205, 86, 0.2)",
//             "rgba(51,105,232, 0.2)",
//             "rgba(244,67,54, 0.2)",
//             "rgba(34,198,246, 0.2)",
//             "rgba(153, 102, 255, 0.2)",
//             "rgba(255, 159, 64, 0.2)",
//             "rgba(233,30,99, 0.2)",
//             "rgba(205,220,57, 0.2)",
//             "rgba(255,0,255,0.3)",
//             "rgba(0,255,0,0.3)"
//         ];
//         $benhnhan1 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '01')->pluck('count');
//         $benhnhan2 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '02')->pluck('count');
//         $benhnhan3 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '03')->pluck('count');
//         $benhnhan4 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '04')->pluck('count');
//         $benhnhan5 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '05')->pluck('count');
//         $benhnhan6 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '06')->pluck('count');
//         $benhnhan7 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '07')->pluck('count');
//         $benhnhan8 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at','08')->pluck('count');
//         $benhnhan9 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '09')->pluck('count');
//         $benhnhan10 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '10')->pluck('count');
//         $benhnhan11 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '11')->pluck('count');
//         $benhnhan12 = benhnhan::select(\DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->whereMonth('created_at', '=', '12')->pluck('count');
//         //dd($benhnhan9);
//         $benhnhanChart = new BenhNhanChart;
//         $benhnhanChart->labels(['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']);
//         $benhnhanChart->dataset('Bệnh nhân theo tháng trong năm '.date('Y'), 'bar', [$benhnhan1->first(),$benhnhan2->first(),$benhnhan3->first(),$benhnhan4->first(),$benhnhan5->first(),$benhnhan6->first(),$benhnhan7->first(),$benhnhan8->first(),$benhnhan9->first(),$benhnhan10->first(),$benhnhan11->first(),$benhnhan12->first()])
//             ->options([
//                     'fill' => 'true',
//                 ])
//             ->color($borderColors)
//             ->backgroundcolor($fillColors);
//         $count_chuyengiao = benhnhan::where('chuyengiao','1')->count();
//         $count_choraychuyen = benhnhan::whereHas('benhvien', function($b)
//         {
//             $b->where('tenbenhvien', 'Bệnh viện Chợ Rẫy');
//         })->where('chuyengiao','1')->count();
//         $count_tuduchuyen = benhnhan::whereHas('benhvien', function($b)
//         {
//             $b->where('tenbenhvien', 'Bệnh viện Từ Dũ');
//         })->where('chuyengiao','1')->count();
//         return view('home',compact('count_user','count_choray','count_tudu',
//         'benhnhanChart','count_chuyengiao','count_choraychuyen','count_tuduchuyen'));
//     }
//     public function chartLineAjax(Request $request)
//     {
//         //$year = $request->has('year') ? $request->year : date('Y');
//         $benhnhan = benhnhan::select(\DB::raw("COUNT(*) as count"))
//                     ->whereYear('ngaykham', date('Y'))
//                     ->groupBy(\DB::raw("Month(ngaykham)"))
//                     ->pluck('count');
  
//         $chart = new BenhNhanChart;
  
//         $chart->dataset('New User Register Chart', 'bar', $benhnhan)->options([
//                     'fill' => 'true',
//                     'borderColor' => '#51C1C0'
//                 ]);
  
//         return $chart->api();
//     }

//     public function profile()
//     {
//         $profile= User::find(Auth::user()->id);
//         $roles=Role::pluck('name','name')->all();
//         $userRole=$profile->roles->pluck('name','name')->all();
//         return view('auth.profile',compact('profile','roles','userRole'));
        
//     }
//     public function profileUpdate(Request $request)
//     {
//         $profile= User::find(Auth::user()->id);
//         $this->validate($request,[
//             // 'username'=>'required',
//             'email'=>'required',
//             // 'danhso'=>'required',
//         ]);
//         // $profile->username=$request->input('username');
//         $profile->email=$request->input('email');
//         // $profile->danhso=$request->input('danhso');
//         if(!empty($request->input('password')))
//         {
//             $profile->password=Hash::make($request->input('password'));
//         }
//         else
//         {
//             $profile=array_except($profile, array('password'));
//         }
//         $profile->save();
//         return redirect()->back()->with('success', 'update successfully');
//     }
// }
