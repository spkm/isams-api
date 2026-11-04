<?php

use Saloon\Enums\Method;
use Saloon\Http\Request;
use spkm\IsamsApi\Requests\Teaching\GetCurriculumSubjectCodesRequest;
use spkm\IsamsApi\Requests\Teaching\GetStudentsInSetBySetidRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectByIdRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectsRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectTeachingDepartmentsBySubjectidRequest;
use spkm\IsamsApi\Requests\Teaching\GetTeachingSetsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets each teaching resource from its iSAMS endpoint', function (Request $request, string $url) {
    $sent = FakeIsams::send($request)->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe($url)
        ->and($sent->query()->all())->toBe([]);
})->with([
    'every subject' => [fn () => new GetSubjectsRequest, 'https://isams.example.test/api/teaching/subjects'],
    'one subject' => [fn () => new GetSubjectByIdRequest(12), 'https://isams.example.test/api/teaching/subjects/12'],
    'a subject\'s teaching departments' => [fn () => new GetSubjectTeachingDepartmentsBySubjectidRequest(12), 'https://isams.example.test/api/teaching/subjects/12/departments'],
    'every teaching set' => [fn () => new GetTeachingSetsRequest, 'https://isams.example.test/api/teaching/sets'],
    'the students in a set' => [fn () => new GetStudentsInSetBySetidRequest(34), 'https://isams.example.test/api/teaching/sets/34/setList'],
    'curriculum subject codes' => [fn () => new GetCurriculumSubjectCodesRequest, 'https://isams.example.test/api/teaching/curriculumsubjectcodes'],
]);
