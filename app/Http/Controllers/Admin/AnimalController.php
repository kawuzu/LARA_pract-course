<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    // Убираем конструктор с $this->middleware, защита через routes group

    public function index()
    {
        $animals = Animal::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.animals.index', compact('animals'));
    }

    public function create()
    {
        return view('admin.animals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'nullable|string|max:255',
            'species'=>'nullable|string|max:255',
            'breed'=>'nullable|string|max:255',
            'age'=>'nullable|integer',
            'sex'=>'nullable|in:male,female,unknown',
            'description'=>'nullable|string',
            'status'=>'nullable|in:available,adopted,fostered,not_available',
            'photo'=>'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('animals', 'public');
            $data['photo'] = $path;
        }

        Animal::create($data);

        return redirect()->route('admin.animals.index')->with('success','Животное добавлено');
    }

    public function show(Animal $animal)
    {
        return view('admin.animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('admin.animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $data = $request->validate([
            'name'=>'nullable|string|max:255',
            'species'=>'nullable|string|max:255',
            'breed'=>'nullable|string|max:255',
            'age'=>'nullable|integer',
            'sex'=>'nullable|in:male,female,unknown',
            'description'=>'nullable|string',
            'status'=>'nullable|in:available,adopted,fostered,not_available',
            'photo'=>'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($animal->photo) {
                Storage::disk('public')->delete($animal->photo);
            }
            $path = $request->file('photo')->store('animals', 'public');
            $data['photo'] = $path;
        }

        $animal->update($data);

        return redirect()->route('admin.animals.index')->with('success','Животное обновлено');
    }

    public function destroy(Animal $animal)
    {
        if ($animal->photo) {
            Storage::disk('public')->delete($animal->photo);
        }
        $animal->delete();
        return redirect()->route('admin.animals.index')->with('success','Животное удалено');
    }
}
