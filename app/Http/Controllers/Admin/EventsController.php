<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Venue;
use Carbon\Carbon;

class EventsController extends Controller
{

    public function index()
    {
        $events = Event::with('event_type', 'venue', 'participants')->orderBy('event_date', 'desc')->paginate(10);
        return view ('panels.admin.events.index', compact('events'));
    }

    public function create()
    {
        $event_types = EventType::pluck('event_type', 'id');
        $venues = Venue::pluck('venue_name', 'id');
        return view ('panels.admin.events.create', compact('venues', 'event_types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'venue_id' => 'required',
            'event_type_id' => 'required',
            'event_title' => 'required',
            'event_date' => 'required',
            'starts_at' => 'required',
            'stops_at' => 'required',
            'event_description' => 'required',
        ]);

        $request['starts_at'] = $request['event_date'] . ' ' . $request['starts_at'] . ':00';
        $request['stops_at'] = $request['event_date'] . ' ' . $request['stops_at'] . ':00';
        $request['event_date'] = $request['event_date'] . ' 00:00:00';

        Event::create($request->all());
        return redirect()->route('admin.events.index');
    }

    public function show($slug)
    {
        $event = Event::findBySlug($slug);
        return view ('panels.admin.events.show', compact('event'));
    }

    public function edit($slug)
    {
        $event_types = EventType::pluck('event_type', 'id');
        $venues = Venue::pluck('venue_name', 'id');
        $event = Event::findBySlug($slug);
        return view ('panels.admin.events.edit', compact('event', 'event_types', 'venues'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $request['starts_at'] = $request['event_date'] . ' ' . $request['starts_at'] . ':00';
        $request['stops_at'] = $request['event_date'] . ' ' . $request['stops_at'] . ':00';
        $request['event_date'] = $request['event_date'] . ' 00:00:00';

        $event->update($request->all());
        return redirect()->route('admin.events.index');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
