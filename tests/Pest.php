<?php

use Saloon\Config;
use spkm\IsamsApi\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real iSAMS: anything sent
| without a mock client throws a StrayRequestException. Fake iSAMS with Tests\Helpers\FakeIsams.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Unit');
