<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    public function index($eventId)
    {
        $event = events::findOrFail($eventId);

        return view('nilai', [
            'eventId' => $eventId,
            'event' => $event
        ]);
    }
}
