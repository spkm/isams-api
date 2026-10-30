<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\HumanResources\Contract;
use spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch;
use spkm\IsamsApi\Data\HumanResources\Employee;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest as GetEmployeeContractsV1Request;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\PatchEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetCurrentEmployeePhotoRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeByUserCodeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\AddRoleEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\GetRoleEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\GetRolesRequest;
use spkm\IsamsApi\Support\JsonPatch;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('asks for version 2.0 of the contract endpoints and reads its contracts as models', function () {
    $isams = FakeIsams::respondWith([GetEmployeeContractsRequest::class => MockResponse::make(['contracts' => [['id' => 6]]])]);

    $contracts = FakeIsams::connector()->humanResources()->employeeContractsV2()->getEmployeeContracts(40)->dto();

    expect($contracts->first())->toBeInstanceOf(Contract::class)
        ->and(FakeIsams::queriesReceived($isams, GetEmployeeContractsRequest::class)[0])->toBe(['api-version' => '2.0']);
});

it('keeps asking for version 1.0 of the contract endpoints by default', function () {
    $isams = FakeIsams::respondWith([GetEmployeeContractsV1Request::class => MockResponse::make(['contracts' => []])]);

    FakeIsams::connector()->humanResources()->employeeContracts()->getEmployeeContracts(40);

    expect(FakeIsams::queriesReceived($isams, GetEmployeeContractsV1Request::class)[0])->toBe([]);
});

it('changes a contract with a JSON Patch document, which only version 2.0 allows', function () {
    $sent = FakeIsams::send(new PatchEmployeeContractRequest(40, 6, JsonPatch::make()->replace('/hoursPerWeek', 30)))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and($sent->getUri()->getQuery())->toBe('api-version=2.0')
        ->and(json_decode((string) $sent->getBody(), true))->toBe([['op' => 'replace', 'path' => '/hoursPerWeek', 'value' => 30]]);
});

it('looks an employee up by user code', function () {
    $employee = FakeIsams::send(new GetEmployeeByUserCodeRequest('ABC'), ['id' => 40, 'surname' => 'Example'])->dto();

    expect($employee)->toBeInstanceOf(Employee::class)
        ->and($employee->id)->toBe(40);
});

it('pages through employees matching a filter as models', function () {
    $isams = FakeIsams::respondWith([GetEmployeesRequest::class => MockResponse::make(['employees' => [['id' => 40]], 'page' => 1, 'totalPages' => 1])]);

    $employees = FakeIsams::connector()->paginate(new GetEmployeesRequest(filter: "Surname eq 'Example'"))->dtos()->all();

    expect($employees[0])->toBeInstanceOf(Employee::class)
        ->and(FakeIsams::queriesReceived($isams, GetEmployeesRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100, '$filter' => "Surname eq 'Example'"]);
});

it('updates several of an employee\'s custom fields at once', function () {
    $sent = FakeIsams::send(new PatchEmployeeCustomFieldsRequest(40, [new CustomFieldForPatch(id: 3, value: 'Yes'), ['id' => 4, 'value' => 'No']]))
        ->getPendingRequest()->createPsrRequest();

    expect(json_decode((string) $sent->getBody(), true))->toBe([['id' => 3, 'value' => 'Yes'], ['id' => 4, 'value' => 'No']]);
});

it('downloads an employee\'s current photo as a file', function () {
    FakeIsams::respondWith([GetCurrentEmployeePhotoRequest::class => MockResponse::make('made-up JPEG bytes', 200, ['Content-Type' => 'image/jpeg'])]);

    $photo = FakeIsams::connector()->send(new GetCurrentEmployeePhotoRequest(40))->dto();

    expect($photo)->toBeInstanceOf(File::class)
        ->and($photo->mimeType)->toBe('image/jpeg');
});

it('adds an employee to a role with a request that has no body', function () {
    $sent = FakeIsams::send(new AddRoleEmployeeRequest(2, 40))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('POST')
        ->and((string) $sent->getUri())->toEndWith('/api/humanresources/roles/2/employees/40')
        ->and((string) $sent->getBody())->toBe('');
});

it('serves HR reference lists from the cache once caching is on, but not who holds a role', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetRolesRequest::class => MockResponse::make(['roles' => []]),
        GetRoleEmployeesRequest::class => MockResponse::make(['employees' => []]),
    ]);
    $humanResources = FakeIsams::connector()->humanResources();

    foreach ([1, 2] as $time) {
        $humanResources->roles()->getRoles();
        $humanResources->roleEmployees()->getRoleEmployees(2);
    }

    expect(FakeIsams::queriesReceived($isams, GetRolesRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetRoleEmployeesRequest::class))->toHaveCount(2);
});
