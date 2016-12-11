<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\CalendarEvent;
use App\Models\Event;
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

        $calendar = Calendar::where('user_id',Auth::user()->id)->with('events')->first();

        return view('home', compact('days','hours','prev','calendar'));
    }

    public function getEditCalendar($id = null){
        if($id){
            $calendar = Calendar::find($id);
        }else{
            $calendar = null;
        }
        return view('modals.edit-calendar', compact('calendar'));
    }
    public function postEditCalendar(Request $request, $id = null){
        $inputs = $request->all();
        if($id){
            $calendar = Calendar::find($id);
            $calendar->update($inputs);
        }else{
            $inputs['user_id'] = Auth::user()->id;
            Calendar::create($inputs);
        }
        return redirect()->back();
    }

    public function getAddEvent(Request $request){
        $hours = $this->hours;
        $date = $request->get('date');
        $time = $request->get('time');
        return view('modals.add-calendar', compact('hours','time','date'));
    }
    public function postAddEvent(Request $request){
        $calendar = Calendar::where('user_id',Auth::user()->id)->first();
        if($request->has('all_day') && $request->get('all_day') == 1){
            $event = Event::create([
                'title' => $request->get('title'),
                'description' => $request->get('title'),
                'all_day' =>  1,
                'all_day_date' => Carbon::createFromFormat('d.m',$request->get('date'))
            ]);
        }else{
            $event = Event::create([
                'title' => $request->get('title'),
                'description' => $request->get('title'),
                'start_event' => Carbon::createFromFormat('d.m H:m',$request->get('date').' '.$request->get('start_time_event')),
                'end_event' => Carbon::createFromFormat('d.m H:m',$request->get('date').' '.$request->get('end_time_event'))
            ]);
        }
        CalendarEvent::create([
            'user_id' => Auth::user()->id,
            'calendar_id' => $calendar->id,
            'event_id' => $event->id
        ]);
        return redirect()->back();
    }
}
