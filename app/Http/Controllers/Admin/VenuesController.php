<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenuesController extends Controller
{
    public function index()
    {
        $venues = Venue::orderBy('venue_name')->get();
        return view ('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        $states = [
            'AR' => 'AR',
            'TX' => 'TX',
        ];
        return view ('admin.venues.create', compact('states'));
    }

    public function store(Venue $venue, Request $request)
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

        $venue->create($request->all());
        return redirect()->route('admin.venues.index', ['slug' => $venue->slug]);
    }

    public function show(Venue $venue)
    {
        return view ('admin.venues.show', compact('venue'));
    }

    public function edit(Venue $venue)
    {
        $states = [
            'AR' => 'AR',
            'TX' => 'TX',
        ];

        return view ('admin.venues.edit', compact('venue', 'states'));
    }

    public function update(Venue $venue, Request $request)
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

        $venue->update($request->all());
        return redirect()->route('admin.venues.show', ['slug' => $venue->slug]);
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('admin.venues.index');
    }
}
