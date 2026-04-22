<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;

class ArtisanController extends Controller
{
    public function index(Request $request)
    {
        $query = Artisan::where('is_approved', true);

        if ($request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('bio', 'like', '%' . $search . '%')
                  ->orWhere('town', 'like', '%' . $search . '%')
                  ->orWhere('county', 'like', '%' . $search . '%');
            });
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->county) {
            $query->where('county', $request->county);
        }

        $sort = $request->sort ?? 'name_asc';
        switch ($sort) {
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'rating_desc':
                $query->orderBy('avg_rating', 'desc');
                break;
            case 'rating_asc':
                $query->orderBy('avg_rating', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $artisans = $query->paginate(9)->appends($request->query());

        $counties = Artisan::where('is_approved', true)->select('county')->distinct()->orderBy('county')->pluck('county');

        return view('artisans.index', compact('artisans', 'counties'));
    }

    public function show($id)
    {
        $artisan = Artisan::findOrFail($id);

        // Block direct access to unapproved listings unless owner or admin
        if (!$artisan->is_approved) {
            $user = auth()->user();
            if (!$user || ($user->id !== $artisan->user_id && !$user->isAdmin())) {
                abort(404);
            }
        }

        return view('artisans.show', compact('artisan'));
    }

    public function create()
    {
        if (!auth()->check() || !auth()->user()->isArtisan()) {
            return redirect('/artisans')->with('error', 'You must be an artisan to create a listing.');
        }

        return view('artisans.create');
    }

    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isArtisan()) {
            return redirect('/artisans')->with('error', 'You must be an artisan to create a listing.');
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

        // Prevent an artisan from creating multiple listings
        if (auth()->user()->artisan()->exists()) {
            return redirect('/artisans')->with('error', 'You already have a listing. Edit your existing one.');
        }

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

        if (auth()->id() !== $artisan->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'You do not have permission to edit this listing.');
        }

        return view('artisans.edit', compact('artisan'));
    }

    public function update(Request $request, $id)
    {
        $artisan = Artisan::findOrFail($id);

        if (auth()->id() !== $artisan->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'You do not have permission to edit this listing.');
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

        if (auth()->id() !== $artisan->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'You do not have permission to delete this listing.');
        }

        $artisan->delete();

        return redirect('/artisans')->with('success', 'Listing deleted successfully!');
    }
}