<?php

namespace App\Http\Controllers;

use App\Models\calendar;
use App\Models\maintencance_appointemts;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
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

    public function create()
    {
        return view('calendar.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required'],
            'start_tijd' => ['required'],
            'eind_tijd' => ['required'],
        ]);

        maintencance_appointemts::create($data);

        return redirect()->route('calendar.index');
    }
}