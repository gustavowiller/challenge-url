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

    public function all(): array
    {
        $userId = auth()->user()->id;

        return Status::user($userId)->get()->toArray();
    }

    public function get(int $id): ?array
    {
        $status = Status::user(auth()->user()->id)->find($id);

        if (!$status) {
            return null;
        }

        return $status->toArray();
    }
}
