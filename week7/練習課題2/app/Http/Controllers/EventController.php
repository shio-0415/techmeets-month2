<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date')->paginate(10);
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load('reservations');
        return view('events.show', compact('event'));
    }
}
