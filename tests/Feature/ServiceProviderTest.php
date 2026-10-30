<?php

use Illuminate\Support\ServiceProvider;
use spkm\IsamsApi\IsamsApiServiceProvider;

it('gives the app an isams-api config of client id, client secret, base URL and named connections', function () {
    expect(config('isams-api'))->toMatchArray(['client_id' => null, 'client_secret' => null, 'base_url' => null, 'connections' => []]);
});

it('reads its client id and secret from ISAMS_REST_CLIENT_ID and ISAMS_REST_CLIENT_SECRET', function () {
    putenv('ISAMS_REST_CLIENT_ID=client-from-env');
    putenv('ISAMS_REST_CLIENT_SECRET=secret-from-env');

    try {
        $config = require dirname(__DIR__, 2).'/config/isams-api.php';
    } finally {
        putenv('ISAMS_REST_CLIENT_ID');
        putenv('ISAMS_REST_CLIENT_SECRET');
    }

    expect($config)->toMatchArray(['client_id' => 'client-from-env', 'client_secret' => 'secret-from-env']);
});

it('reads its base URL from ISAMS_BASE_URL', function () {
    putenv('ISAMS_BASE_URL=https://isams.example.test');

    try {
        $config = require dirname(__DIR__, 2).'/config/isams-api.php';
    } finally {
        putenv('ISAMS_BASE_URL');
    }

    expect($config['base_url'])->toBe('https://isams.example.test');
});

it('still reads its base URL from the misspelt IASMS_BASE_URL that earlier versions used', function () {
    putenv('IASMS_BASE_URL=https://isams.example.test');

    try {
        $config = require dirname(__DIR__, 2).'/config/isams-api.php';
    } finally {
        putenv('IASMS_BASE_URL');
    }

    expect($config['base_url'])->toBe('https://isams.example.test');
});

it('publishes its config file to the app under the isams-api-config tag', function () {
    expect(ServiceProvider::pathsToPublish(IsamsApiServiceProvider::class, 'isams-api-config'))->toBe([
        dirname(__DIR__, 2).'/src/../config/isams-api.php' => config_path('isams-api.php'),
    ]);
});

it('offers an isams-api:install command that publishes the config', function () {
    $this->artisan('isams-api:install')->assertSuccessful();

    expect(config_path('isams-api.php'))->toBeFile();
})->after(fn () => @unlink(config_path('isams-api.php')));
