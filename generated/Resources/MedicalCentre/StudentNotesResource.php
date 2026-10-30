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
    public function archiveStudentNote(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new ArchiveStudentNoteRequest($schoolId, $noteId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate|array<string, mixed>  $note
     */
    public function createStudentNote(string $schoolId, MedicalNoteForCreate|array $note): Response
    {
        return $this->connector->send(new CreateStudentNoteRequest($schoolId, $note));
    }

    public function deleteStudentNote(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new DeleteStudentNoteRequest($schoolId, $noteId));
    }

    public function getStudentNote(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new GetStudentNoteRequest($schoolId, $noteId));
    }

    public function getStudentNotes(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentNotesRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentNote(string $schoolId, string $noteId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentNoteRequest($schoolId, $noteId, $patch));
    }

    public function restoreStudentNote(string $schoolId, string $noteId): Response
    {
        return $this->connector->send(new RestoreStudentNoteRequest($schoolId, $noteId));
    }
}
