<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    protected $hours = ["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"];

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sevenDays($date){
        $days = [];
        for($i=0; $i<7; $i++){
            $days[$i] = $date->addDays($i)->format('d.m');
        }
        return $days;
    }
    public function getIndex(Request $request){
        if($request->has('date')){
            $date = Carbon::createFromFormat('d.m',$request->get('date'));
            $prev = $date->subDays(7)->format('d.m');
        }else{
            $date = Carbon::now();
            $prev = $date->subDays(7)->format('d.m');
        }
        $days = $this->sevenDays($date);
        $hours = $this->hours;

        $calendar = Calendar::where('user_id',Auth::user()->id)->first();

        return view('home', compact('days','hours','prev','calendar'));
    }
}
