<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::where('is_active', true)->orderBy('date')->get();
        return view('workshops.index', compact('workshops'));
    }

    public function create()
    {
        return view('workshops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'duration_hours' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'max_capacity' => 'required|integer|min:1',
        ]);

        $artisan = auth()->user()->artisan;

        $workshop = new Workshop();
        $workshop->artisan_id = $artisan->id;
        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->date = $request->date;
        $workshop->start_time = $request->start_time;
        $workshop->duration_hours = $request->duration_hours;
        $workshop->price = $request->price;
        $workshop->max_capacity = $request->max_capacity;
        $workshop->is_active = true;
        $workshop->save();

        return redirect('/workshops')->with('success', 'Workshop created successfully!');
    }

    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);

        if (auth()->id() !== $workshop->artisan->user_id) {
            return redirect('/workshops')->with('error', 'You do not have permission to edit this workshop.');
        }

        return view('workshops.edit', compact('workshop'));
    }

    public function update(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);

        if (auth()->id() !== $workshop->artisan->user_id) {
            return redirect('/workshops')->with('error', 'You do not have permission to edit this workshop.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'duration_hours' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'max_capacity' => 'required|integer|min:1',
        ]);

        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->date = $request->date;
        $workshop->start_time = $request->start_time;
        $workshop->duration_hours = $request->duration_hours;
        $workshop->price = $request->price;
        $workshop->max_capacity = $request->max_capacity;
        $workshop->save();

        return redirect('/workshops')->with('success', 'Workshop updated successfully!');
    }

    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);

        if (auth()->id() !== $workshop->artisan->user_id) {
            return redirect('/workshops')->with('error', 'You do not have permission to delete this workshop.');
        }

        $workshop->delete();

        return redirect('/workshops')->with('success', 'Workshop deleted successfully!');
    }
}