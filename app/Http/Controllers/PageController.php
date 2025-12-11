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
        $animals = Animal::orderBy('created_at','desc')->paginate(12);
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
        $advices = Advice::orderBy('created_at','desc')->paginate(10);
        return view('pages.advices.index', compact('advices'));
    }

    public function stories()
    {
        $stories = Story::with('user')->orderBy('created_at','desc')->paginate(10);
        return view('pages.stories.index', compact('stories'));
    }

    public function lostFound()
    {
        $lost = Animal::where('category', 'lost')->orderBy('created_at', 'desc')->get();
        $found = Animal::where('category', 'found')->orderBy('created_at', 'desc')->get();

        return view('pages.lostfound', compact('lost', 'found'));
    }

    public function storeLost(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image'
        ]);

        $data['category'] = 'lost';

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('animals','public');
        }

        Animal::create($data);

        return redirect()->route('lostfound')->with('success','Потеряшка добавлена');
    }

    public function storeFound(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image'
        ]);

        $data['category'] = 'found';

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('animals','public');
        }

        Animal::create($data);

        return redirect()->route('lostfound')->with('success','Найдёныш добавлен');
    }

    public function eventsFilter(Request $request)
    {
        $date = $request->query('date'); // формат: Y-m-d
        if ($date) {
            $events = Event::whereDate('starts_at', $date)
                ->orderBy('starts_at')
                ->get();
        } else {
            $events = Event::orderBy('starts_at')->get();
        }

        return view('pages.events.index', compact('events', 'date'));
    }

}
