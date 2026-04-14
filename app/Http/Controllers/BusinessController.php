<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
        public function index()
        {
                $query = Business::query();

                if (request('search'))
                {
                        $query->where('name', 'like', '%' . request('search') . '%')
                              ->orWhere('description', 'like', '%' . request('search') . '%');
                }

                if (request('category'))
                {
                        $query->where('category', request('category'));
                }

                $businesses = $query->get();
                return view('businesses.index', compact('businesses'));
        }

        public function create()
        {
                if (!auth()->check() || !auth()->user()->isOwner())
                {
                        return redirect('/businesses');
                }

                return view('businesses.create');
        }

        public function store(Request $request)
        {
                if (!auth()->check() || !auth()->user()->isOwner())
                {
                        return redirect('/businesses');
                }

                $request->validate([
                        'name' => 'required',
                        'category' => 'required',
                        'description' => 'required',
                        'address' => 'required',
                        'phone' => 'required',
                        'opening_hours' => 'required',
                ]);

                Business::create([
                        'user_id' => auth()->id(),
                        'name' => $request->name,
                        'category' => $request->category,
                        'description' => $request->description,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'opening_hours' => $request->opening_hours,
                ]);

                return redirect('/businesses');
        }

        public function show(Business $business)
        {
                return view('businesses.show', compact('business'));
        }

        public function edit(Business $business)
        {
                if (auth()->id() != $business->user_id)
                {
                        return redirect('/businesses');
                }

                return view('businesses.edit', compact('business'));
        }

        public function update(Request $request, Business $business)
        {
                if (auth()->id() != $business->user_id)
                {
                        return redirect('/businesses');
                }

                $request->validate([
                        'name' => 'required',
                        'category' => 'required',
                        'description' => 'required',
                        'address' => 'required',
                        'phone' => 'required',
                        'opening_hours' => 'required',
                ]);

                $business->update([
                        'name' => $request->name,
                        'category' => $request->category,
                        'description' => $request->description,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'opening_hours' => $request->opening_hours,
                ]);

                return redirect('/businesses');
        }

        public function destroy(Business $business)
        {
                if (auth()->id() != $business->user_id)
                {
                        return redirect('/businesses');
                }

                $business->delete();
                return redirect('/businesses');
        }
}