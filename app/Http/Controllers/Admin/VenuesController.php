<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenuesController extends Controller
{
    public function index()
    {
        $venues = Venue::orderBy('venue_name')->paginate(20);
        return view ('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view ('admin.venues.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'venue_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        Venue::create($request->all());
        return redirect()->route('admin.venues.index');
    }

    public function show($slug)
    {
        $venue = Venue::findBySlug($slug);
        return view ('admin.venues.show', compact('venue'));
    }

    public function edit($slug)
    {
        $venue = Venue::findBySlug($slug);
        return view ('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);
        $venue->update($request->all());
        return redirect()->route('admin.venues.show', ['slug' => $venue->slug]);
    }

    public function destroy($id)
    {
        $venue = Venue::find($id);
        $venue->delete();
        return redirect()->route('admin.venues.index');
    }
}
