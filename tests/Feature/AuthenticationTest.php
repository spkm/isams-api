<?php

use spkm\IsamsApi\IsamsConnector;


test('It successfully retrieves an access token for the rest api', function () {

    //TODO env / config!
    $clientId = "";
    $clientSecret = "";
    $baseUrl = "";
    $scopes = ['restapi'];

    $connector = new IsamsConnector($clientId, $clientSecret, $baseUrl, $scopes);
    $authenticator = $connector->getAccessToken();

    expect($authenticator->accessToken)->toBeString();
});


test('It successfully retrieves an access token for the batch api', function () {

    //TODO env / config!
    $clientId = "";
    $clientSecret = "";
    $baseUrl = "";
    $scopes = ['apiv1'];

    $connector = new IsamsConnector($clientId, $clientSecret, $baseUrl, $scopes);
    $authenticator = $connector->getAccessToken();

    expect($authenticator->accessToken)->toBeString();
});
