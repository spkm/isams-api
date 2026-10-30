<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\ArchiveStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\CreateStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\DeleteStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNotesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\PatchStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\RestoreStudentNoteRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentNotesResource extends BaseResource
{
    public function all(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentNotesRequest($schoolId));
    }

    public function archive(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new ArchiveStudentNoteRequest($schoolId, $noteId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate|array<string, mixed>  $medicalNote
     */
    public function create(string $schoolId, MedicalNoteForCreate|array $medicalNote): Response
    {
        return $this->connector->send(new CreateStudentNoteRequest($schoolId, $medicalNote));
    }

    public function delete(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new DeleteStudentNoteRequest($schoolId, $noteId));
    }

    public function get(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new GetStudentNoteRequest($schoolId, $noteId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, string $noteId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentNoteRequest($schoolId, $noteId, $patch));
    }

    public function restore(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new RestoreStudentNoteRequest($schoolId, $noteId));
    }
}
