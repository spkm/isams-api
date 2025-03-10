<?php

use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;

test('It successfully retrieves all pages of the students endpoint', function () {

    // TODO env / config!
    $clientId = '';
    $clientSecret = '';
    $baseUrl = '';

    $connector = new IsamsConnector($clientId, $clientSecret, $baseUrl);
    $request = new GetStudentsRequest;
    $paginator = $connector->paginate($request);

    $data = $paginator->collect(throughItems: false);

    foreach ($data as $response) {
        dd($response->json());
    }
});
