<?php

namespace App\Http\Controllers\guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gurucontroller extends Controller
{
    public function index()
    {
        // Logic for the dashboard, e.g., fetching data or statistics for the dashboard view
        return view('guru.dashboard'); // Adjust view path as needed
    }
}
