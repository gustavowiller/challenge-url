<?php

namespace App\Services;

use App\Models\Status;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class URLService
{
    public function checkAll(): void
    {
        $statusAll = Status::all();

        foreach ($statusAll as $status) {
            try {
                $this->check($status);
            } catch (Exception $exception) {
                Log::error($exception);
            }
        }
    }

    protected function check(Status $status): void
    {
        $response = Http::get($status['url']);

        $status->fill(
            [
                "status_code" => $response->status(),
                "body_response" => htmlentities($response->getBody(), ENT_QUOTES),
                "last_update" => Carbon::now()
            ]
        );

        $status->update();
    }
}
