<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkByIdRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractsRequest as GetEmployeeContractsV1Request;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\ArchiveStudentConditionRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes\GetContactTypesRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;
use spkm\IsamsApi\Tests\Helpers\Spec;

it('names generated requests after what they do', function (string $method, string $path, string $class) {
    $operation = collect(Spec::manifest()['operations'])->sortKeys()->last(fn (array $operation) => $operation['method'] === $method && $operation['path'] === $path);

    expect($operation['class'])->toBe('spkm\IsamsApi\Requests\\'.$class);
})->with([
    'a list' => ['GET', '/api/estates/buildings', 'Estates\Buildings\GetBuildingsRequest'],
    'one item by its id' => ['GET', '/api/estates/buildings/{id}', 'Estates\Buildings\GetBuildingRequest'],
    'a body-less association' => ['POST', '/api/estates/buildings/{buildingId}/divisions/{divisionId}', 'Estates\BuildingDivisions\AddBuildingDivisionRequest'],
    'the area\'s own resource, in the area namespace' => ['POST', '/api/students/{schoolId}/commands/movetoalumni', 'Students\MoveStudentToAlumniRequest'],
    'a "get all" action, without the "all"' => ['GET', '/api/medical/notetypes', 'MedicalCentre\Note\GetMedicalNoteTypesRequest'],
    'a command, beside its resource\'s plural namespace' => ['POST', '/api/medical/students/{schoolId}/conditions/{conditionId}/commands/archive', 'MedicalCentre\StudentConditions\ArchiveStudentConditionRequest'],
    'a command, beside its resource\'s singular namespace' => ['POST', '/api/medical/students/{schoolId}/inventory/{inventoryId}/commands/archive', 'MedicalCentre\StudentInventory\ArchiveStudentInventoryRequest'],
    'a resource named like its parent, in the parent\'s namespace' => ['GET', '/api/systemconfiguration/list/{listType}', 'SystemConfiguration\List\GetListByTypeRequest'],
    'a tag with a placeholder segment, left out of the namespace' => ['GET', '/api/portals/documentsigning/signingrequests', 'CloudPortals\DocumentSigning\GetDocumentsForSigningRequest'],
    'a namespace without the words its parents already say' => ['GET', '/api/teaching/sets', 'Teaching\Sets\GetTeachingSetsRequest'],
    'a namespace without iSAMS\'s noise words' => ['GET', '/api/portals/school/houses', 'CloudPortals\School\Houses\GetHousesRequest'],
    'the newest iSAMS version, at the plain name' => ['GET', '/api/humanresources/employees/{employeeId}/contracts', 'HumanResources\EmployeeContracts\GetEmployeeContractsRequest'],
    'an override' => ['POST', '/api/teaching/sets/{setId}/setList/{schoolId}', 'Teaching\Sets\AddStudentToTeachingSetRequest'],
])->group('spec');

it('reaches each request through resources named for the action', function (array $resources, string $method, array $arguments, string $request) {
    $isams = FakeIsams::respondWith([$request => MockResponse::make([])]);
    $resource = FakeIsams::connector();

    foreach ($resources as $name) {
        $resource = $resource->{$name}();
    }

    $resource->{$method}(...$arguments);

    $isams->assertSent($request);
})->with([
    'a list' => [['teaching', 'subjects'], 'all', [], GetSubjectsRequest::class],
    'one item' => [['teaching', 'subjects'], 'get', [7], GetSubjectRequest::class],
    'a nested resource' => [['systemConfiguration', 'list', 'contactTypes'], 'all', [], GetContactTypesRequest::class],
    'an action of its own' => [['medicalCentre', 'studentConditions'], 'archive', ['100001', 'a-key'], ArchiveStudentConditionRequest::class],
    'a write to several' => [['students', 'customFields'], 'patchMany', ['100001', []], PatchStudentCustomFieldsRequest::class],
    'an action without its "by id"' => [['cloudPortals', 'homework'], 'get', [7], GetHomeworkByIdRequest::class],
    'the newest iSAMS version' => [['humanResources', 'employeeContracts'], 'all', [40], GetEmployeeContractsRequest::class],
    'an older iSAMS version, by name' => [['humanResources', 'employeeContracts', 'v1'], 'all', [40], GetEmployeeContractsV1Request::class],
])->group('spec');
