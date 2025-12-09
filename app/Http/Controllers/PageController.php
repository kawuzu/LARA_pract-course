<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Event;
use App\Models\Advice;
use App\Models\Story;

class PageController extends Controller
{
    public function home()
    {
        $events = Event::orderBy('starts_at')->take(3)->get();
        $animals = Animal::where('status', 'available')->take(6)->get();
        return view('pages.home', compact('events', 'animals'));
    }

    public function animals()
    {
        $animals = Animal::paginate(12);
        return view('pages.animals.index', compact('animals'));
    }

    public function animalShow(Animal $animal)
    {
        return view('pages.animals.show', compact('animal'));
    }

    public function events()
    {
        $events = Event::orderBy('starts_at')->paginate(10);
        return view('pages.events.index', compact('events'));
    }

    public function advices()
    {
        $advices = Advice::paginate(10);
        return view('pages.advices.index', compact('advices'));
    }

    public function stories()
    {
        $stories = Story::with('user')->paginate(10);
        return view('pages.stories.index', compact('stories'));
    }
}
