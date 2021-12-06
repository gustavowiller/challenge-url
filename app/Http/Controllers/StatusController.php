<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;

class StatusController extends Controller
{
    public function create()
    {
        return view('status.create');
    }

    public function store(StoreStatusRequest $request)
    {
        return redirect('/status');
    }

    public function index()
    {
        return view('status.index');
    }
}
