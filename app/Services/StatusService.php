<?php

namespace App\Services;

use App\Models\Status;

class StatusService
{
    public function create(array $input): array
    {
        $input["user_id"] = auth()->user()->id;

        $status = Status::create($input);

        return $status->toArray();
    }
}