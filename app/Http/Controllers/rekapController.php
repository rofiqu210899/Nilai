<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index($eventId)
    {
        // dd($eventId);
        return view('rekap', [
            'eventId' => $eventId,

        ]);
    }
}
