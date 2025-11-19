<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class eventController extends Controller
{
    public function index()
    {
        $data = events::get();

        // dd($data);
        return view('dashboard', compact('data'));
    }
    public function addEvent()
    {
        $data = events::get();
        return view('addEvent', compact('data'));
    }
    public function lombaPage()
    {
        $data = events::get();
        return view('addEvent', compact('data'));
    }
}
