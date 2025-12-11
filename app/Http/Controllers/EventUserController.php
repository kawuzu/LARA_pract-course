<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function join(Event $event)
    {
        $user = auth()->user();

        if (!$user->events->contains($event->id)) {
            $user->events()->attach($event->id);
        }

        return redirect()->back()->with('success', 'Вы записались на мероприятие!');
    }

    public function leave(Event $event)
    {
        $user = auth()->user();

        $user->events()->detach($event->id);

        return redirect()->back()->with('success', 'Вы отменили запись.');
    }
}
