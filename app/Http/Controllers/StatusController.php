<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function create()
    {
        return view('status.create');
    }

    public function store(Request $request)
    {
        return redirect('/status');
    }

    public function index()
    {
        return view('status.index');
    }
}
