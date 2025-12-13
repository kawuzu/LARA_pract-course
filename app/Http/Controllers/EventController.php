<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

    // Публичная страница мероприятия
    public function show(Event $event)
    {
        return view('pages.events.show', compact('event'));
    }

    // Запись на мероприятие
    public function register(Event $event)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Здесь предполагаем связь Many-to-Many user <-> event
        $event->users()->syncWithoutDetaching($user->id);

        return redirect()->back()->with('success', 'Вы успешно записаны на мероприятие!');
    }
}
