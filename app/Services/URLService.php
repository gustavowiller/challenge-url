<?php

namespace App\Services;

use App\Models\Status;
use Exception;
use GuzzleHttp\Psr7\Stream;
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
                "body_response" => htmlentities(
                    $this->readBodyResponse($response->getBody()),
                    ENT_QUOTES
                )
            ]
        );

        $status->update();
    }

    protected function readBodyResponse(Stream $body): string
    {
        $bytesRead = 0;
        $dataRead = "";

        while (!$body->eof()) {
            $data = $body->read(1024);
            $dataRead .= $data;
            $bytesRead += strlen($data);

            if ($bytesRead >= 15*1024) {
                break;
            }
        }

        return $dataRead;
    }
}
