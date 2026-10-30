<?php

use Saloon\Enums\Method;
use Saloon\Http\Request;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentSystemStatusesRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentPhotoBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetPhotosBySchoolidPhotoidRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets each student resource from its iSAMS endpoint', function (Request $request, string $url) {
    $sent = FakeIsams::send($request)->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe($url)
        ->and($sent->query()->all())->toBe([]);
})->with([
    'every student' => [new GetStudentsRequest, 'https://isams.example.test/api/students'],
    'one student' => [new GetStudentRequest('100001'), 'https://isams.example.test/api/students/100001'],
    'student system statuses' => [new GetStudentSystemStatusesRequest, 'https://isams.example.test/api/students/systemstatuses'],
    'a student\'s current photo' => [new GetCurrentPhotoBySchoolidRequest('100001'), 'https://isams.example.test/api/students/100001/photos/current'],
    'one of a student\'s photos' => [new GetPhotosBySchoolidPhotoidRequest('100001', 7), 'https://isams.example.test/api/students/100001/photos/7'],
]);

it('asks for every student with only the page, page size, expansions and filter it was given', function () {
    $sent = FakeIsams::send(new GetStudentsRequest(page: 2, expand: 'customFields', filter: "surname eq 'Smith'"))->getPendingRequest();

    expect($sent->query()->all())->toBe(['page' => 2, 'expand' => 'customFields', '$filter' => "surname eq 'Smith'"]);
});

it('asks for one student with the expansions it was given', function () {
    $sent = FakeIsams::send(new GetStudentRequest('100001', expand: 'customFields'))->getPendingRequest();

    expect($sent->query()->all())->toBe(['expand' => 'customFields']);
});
