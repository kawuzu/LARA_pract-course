<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function calendar(Request $request)
    {
        $events = Event::orderBy('starts_at')->get();
        return view('pages.events.calendar', compact('events'));
    }

    public function filter(Request $request)
    {
        $date = $request->query('date');
        $events = Event::whereDate('starts_at', $date)->orderBy('starts_at')->get();
        return view('pages.events.calendar', compact('events', 'date'));
    }

    public function show(Event $event)
    {
        return view('pages.events.show', compact('event'));
    }

    public function register(Event $event)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $event->users()->syncWithoutDetaching($user->id);

        return redirect()->back()->with('success', 'Вы успешно записаны на мероприятие!');
    }
}
