<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PwcDbEvents;

class EventController extends Controller
{
    public function show($slug)
    {
        $event = PwcDbEvents::where('slug', $slug)->firstOrFail();
        return view('events.events-details', compact('event'));
    }
}
