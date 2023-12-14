<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maintencance_appointemts;
use App\Models\calendar;

class MaintencanceAppointemtsController extends Controller
{
    function fullcalendar(){
        $calendars = maintencance_appointemts::all();

        $data = [];

        foreach ($calendars as $calendar)
        {
            array_push($data, [
                'title' => $calendar->title,
                'start' => $calendar->start_tijd,
                'end' => $calendar->eind_tijd,
                'startEditable' => true
            ]);
        }

        return view('calendar.index',[
            'data' => $data
        ]);
    }
}
