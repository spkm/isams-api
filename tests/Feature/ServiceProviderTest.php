<?php

use Illuminate\Support\ServiceProvider;
use spkm\IsamsApi\IsamsApiServiceProvider;

it('gives the app an isams-api config of client id, client secret and base URL', function () {
    expect(config('isams-api'))->toBe(['client_id' => null, 'client_secret' => null, 'base_url' => null]);
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

it('reads its base URL from ISAMS_BASE_URL')
    ->todo(note: 'Suspected bug: the config reads the misspelt IASMS_BASE_URL, so setting ISAMS_BASE_URL leaves the base URL empty (config/isams-api.php, base_url)')
    ->group('suspected-bug');

it('publishes its config file to the app under the isams-api tag', function () {
    expect(ServiceProvider::pathsToPublish(IsamsApiServiceProvider::class, 'isams-api'))->toBe([
        dirname(__DIR__, 2).'/src/../config/isams-api.php' => config_path('isams-api.php'),
    ]);
});

it('offers an isams-api:install command that publishes the config')
    ->todo(note: 'Suspected bug: configurePackage() asks for an install command, but boot() overrides PackageServiceProvider::boot() without calling it, so spatie never registers the command (src/IsamsApiServiceProvider.php, boot())')
    ->group('suspected-bug');
