<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    // страница с календарём
    public function calendar(Request $request)
    {
        $events = Event::orderBy('starts_at')->get();
        return view('pages.events.calendar', compact('events'));
    }

    // фильтр по дате
    public function filter(Request $request)
    {
        $date = $request->query('date');
        $events = Event::whereDate('starts_at', $date)->orderBy('starts_at')->get();
        return view('pages.events.calendar', compact('events', 'date'));
    }
}
