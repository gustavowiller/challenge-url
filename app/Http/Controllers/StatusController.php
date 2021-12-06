<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Services\StatusService;

class StatusController extends Controller
{
    /**
     * @var StatusService $statusService
     */
    protected $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(StoreStatusRequest $request)
    {
        $this->statusService->create($request->validated());

        return redirect('/status');
    }

    public function index()
    {
        return view('status.index');
    }
}
