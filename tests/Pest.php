<?php

use Saloon\Config;
use spkm\IsamsApi\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real iSAMS: anything sent
| without a mock client throws a StrayRequestException. Fake iSAMS with Tests\Helpers\FakeIsams. Only the separate
| Sandbox suite (tests/Sandbox) talks to a real iSAMS, and only to the sandbox you name in ISAMS_SANDBOX_*.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Unit', 'Spec', 'Sandbox');
