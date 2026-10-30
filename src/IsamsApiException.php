<?php

namespace spkm\IsamsApi;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class IsamsApiException extends RequestException
{
    public function __construct(Response $response)
    {
        $message = $response->json('message');

        parent::__construct($response, 'iSAMS responded '.$response->status().($message ? ': '.$message : ''));
    }

    public function isamsMessage(): ?string
    {
        return $this->getResponse()->json('message');
    }

    public function trackingNumber(): ?string
    {
        return $this->getResponse()->json('trackingNumber');
    }
}
