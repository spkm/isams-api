<?php

use spkm\IsamsApi\Tests\Helpers\Spec;

it('names generated requests after what they do', function (string $method, string $path, string $class) {
    $operation = collect(Spec::manifest()['operations'])->first(fn (array $operation) => $operation['method'] === $method && $operation['path'] === $path);

    expect($operation['class'])->toBe('spkm\IsamsApi\Requests\\'.$class);
})->with([
    'a list' => ['GET', '/api/estates/buildings', 'Estates\Buildings\GetBuildingsRequest'],
    'one item by its id' => ['GET', '/api/estates/buildings/{id}', 'Estates\Buildings\GetBuildingRequest'],
    'a body-less association' => ['POST', '/api/estates/buildings/{buildingId}/divisions/{divisionId}', 'Estates\BuildingDivisions\AddBuildingDivisionRequest'],
    'the area\'s own resource, in the area namespace' => ['POST', '/api/students/{schoolId}/commands/movetoalumni', 'Students\MoveStudentToAlumniRequest'],
    'a "get all" action, without the "all"' => ['GET', '/api/medical/notetypes', 'MedicalCentre\Note\GetMedicalNoteTypesRequest'],
    'a command, beside its resource\'s plural namespace' => ['POST', '/api/medical/students/{schoolId}/conditions/{conditionId}/commands/archive', 'MedicalCentre\StudentConditions\ArchiveStudentConditionRequest'],
    'a command, beside its resource\'s singular namespace' => ['POST', '/api/medical/students/{schoolId}/inventory/{inventoryId}/commands/archive', 'MedicalCentre\StudentInventory\ArchiveStudentInventoryRequest'],
    'an override' => ['POST', '/api/teaching/sets/{setId}/setList/{schoolId}', 'Teaching\TeachingSets\AddStudentToTeachingSetRequest'],
])->group('spec');
