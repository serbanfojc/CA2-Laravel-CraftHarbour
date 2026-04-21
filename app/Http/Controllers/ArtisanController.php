<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;

class ArtisanController extends Controller
{
    public function index(Request $request)
    {
        $query = Artisan::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        $artisans = $query->where('is_approved', true)->paginate(6);

        return view('artisans.index', compact('artisans'));
    }

    public function show($id)
    {
        $artisan = Artisan::findOrFail($id);
        return view('artisans.show', compact('artisan'));
    }

    public function create()
    {
        return view('artisans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'bio' => 'required|string',
            'town' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $artisan = new Artisan();
        $artisan->user_id = auth()->id();
        $artisan->name = $request->name;
        $artisan->category = $request->category;
        $artisan->bio = $request->bio;
        $artisan->town = $request->town;
        $artisan->county = $request->county;
        $artisan->email = $request->email;
        $artisan->phone = $request->phone;
        $artisan->website = $request->website;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('artisans', 'public');
            $artisan->cover_image = asset('storage/' . $path);
        }

        $artisan->save();

        return redirect('/artisans/' . $artisan->id)->with('success', 'Listing created successfully!');
    }

    public function edit($id)
    {
        $artisan = Artisan::findOrFail($id);

        if (auth()->id() !== $artisan->user_id) {
            return redirect('/artisans')->with('error', 'You do not have permission to edit this listing.');
        }

        return view('artisans.edit', compact('artisan'));
    }

    public function update(Request $request, $id)
    {
        $artisan = Artisan::findOrFail($id);

        if (auth()->id() !== $artisan->user_id) {
            return redirect('/artisans')->with('error', 'You do not have permission to edit this listing.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'bio' => 'required|string',
            'town' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $artisan->name = $request->name;
        $artisan->category = $request->category;
        $artisan->bio = $request->bio;
        $artisan->town = $request->town;
        $artisan->county = $request->county;
        $artisan->email = $request->email;
        $artisan->phone = $request->phone;
        $artisan->website = $request->website;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('artisans', 'public');
            $artisan->cover_image = asset('storage/' . $path);
        }

        $artisan->save();

        return redirect('/artisans/' . $artisan->id)->with('success', 'Listing updated successfully!');
    }

    public function destroy($id)
    {
        $artisan = Artisan::findOrFail($id);

        if (auth()->id() !== $artisan->user_id) {
            return redirect('/artisans')->with('error', 'You do not have permission to delete this listing.');
        }

        $artisan->delete();

        return redirect('/artisans')->with('success', 'Listing deleted successfully!');
    }
}