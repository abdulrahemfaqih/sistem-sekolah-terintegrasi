<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class superadmincontroller extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard'); // Ensure this path exists
    }
}

