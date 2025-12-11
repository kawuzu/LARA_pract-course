<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostReport;
use Illuminate\Support\Facades\Storage;

class LostReportController extends Controller
{
    public function index()
    {
        $lostReports = LostReport::where('type', 'lost')->latest()->get();
        $foundReports = LostReport::where('type', 'found')->latest()->get();
        return view('pages.lost_reports', compact('lostReports', 'foundReports'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:lost,found',
            'name' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('lost_reports', 'public');
        }

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        LostReport::create($data);

        return redirect()->back()->with('success', 'Заявка успешно отправлена!');
    }
}
