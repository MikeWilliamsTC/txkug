<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::get();

        return view('public.events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::findBySlug($slug);
        return view('public.events.show', compact('event'));
    }
}
