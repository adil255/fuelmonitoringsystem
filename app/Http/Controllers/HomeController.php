<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fms as f;
use App\fillLevel_logs as fl;
use App\status_logs as sl;
use DB;
use Carbon\Carbon;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
    
        $fms = f::where('user_id',$user->id)->paginate(5);
        return view('users.log')->with('fms',$fms)->with('user',$user);

    }

    public function sensor()
    {
        $user = Auth::user();
        $success = null;
        return view('users.sensor')->with('success',$success)->with('user',$user);
    }

    public function fms_log(Request $request)
    {
        $user = Auth::user();
        $fms = f::where('id',$request->id)->first();
        $fl = fl::where('fms_id',$request->id)->get();
        $sl = sl::where('fms_id',$request->id)->get();

        $avgArray = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('fillLevel');
            $date = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray[$j] = 0;  

            }
            else {
                $avgArray[$j] = $temp;  
            }

            $j++;
        }

        $countArray = [];
        $j = 0;
        for($i=6; $i>=0; $i--) {

            $temp = DB::table('status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->where('status',1)->count();
            
            $countArray[$j] = $temp;

            $j++;
        }

        $dateArray = [];
        $k = 0;
        for($m=6; $m>=0; $m--) {
            $temp1 = Carbon::now()->subDays($m)->format('y/m/d');
            $dateArray[$k] = $temp1;
            $k++;
        }

        return view('users.fms_log')
                ->with('fill_level_logs',$fl)
                ->with('status_logs',$sl)
                ->with('fms',$fms)
                ->with('avgFillLevel', $avgArray)
                ->with('statusCount', $countArray)
                ->with('dateLabels',$dateArray)
                ->with('user',$user);
    }

    public function log()
    {
        $user = Auth::user();
        $fms = f::where('user_id',$user->id)->paginate(7);
        return view('users.log')->with('fms',$fms)->with('user',$user);
    }

    public function notifications(Request $request)
    {
        // dd($request);

        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id)->paginate(7);
        return view('pages.notifications')->with('fms',$fms)->with('user',$user);
    }

    public function user_u(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id);
        return view('users.user_u')->with('fms',$fms)->with('user',$user);
    }






    public function index_a()
    {
        $user = Auth::user();
    
        $fms = f::where('user_id',$user->id)->paginate(5);
        return view('users.log_a')->with('fms',$fms)->with('user',$user);

    }

    public function sensor_a()
    {
        $user = Auth::user();
        $success = null;
        return view('users.sensor_a')->with('success',$success)->with('user',$user);
    }

    public function fms_log_a(Request $request)
    {
        $user = Auth::user();
        $fms = f::where('id',$request->id)->first();
        $fl = fl::where('fms_id',$request->id)->get();
        $sl = sl::where('fms_id',$request->id)->get();

        $avgArray = [];
        $j = 0;
        $sum = 0;

        for($i=6; $i>=0; $i--) {

            $temp = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->avg('fillLevel');
            $date = DB::table('fill_level_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::createFromDate()->format('d/m/y'))->get();
            if($temp == null) {
                $avgArray[$j] = 0;  

            }
            else {
                $avgArray[$j] = $temp;  
            }

            $j++;
        }

        $countArray = [];
        $j = 0;
        for($i=6; $i>=0; $i--) {

            $temp = DB::table('status_logs')->where('fms_id', $request->id)->whereDate('created_at', Carbon::now()->subDays($i))->where('status',1)->count();
            
            $countArray[$j] = $temp;

            $j++;
        }

        $dateArray = [];
        $k = 0;
        for($m=6; $m>=0; $m--) {
            $temp1 = Carbon::now()->subDays($m)->format('y/m/d');
            $dateArray[$k] = $temp1;
            $k++;
        }

        return view('users.fms_log_a')
                ->with('fill_level_logs',$fl)
                ->with('status_logs',$sl)
                ->with('fms',$fms)
                ->with('avgFillLevel', $avgArray)
                ->with('statusCount', $countArray)
                ->with('dateLabels',$dateArray)
                ->with('user',$user);
    }

    public function log_a()
    {
        $user = Auth::user();
        $fms = f::where('user_id',$user->id)->paginate(7);
        return view('users.log_a')->with('fms',$fms)->with('user',$user);
    }

    public function notifications_a(Request $request)
    {
        // dd($request);

        $user = Auth::user();
        $fms = f::where('user_id',$request->user_id)->paginate(7);
        return view('pages.notifications_a')->with('fms',$fms)->with('user',$user);
    }




}
