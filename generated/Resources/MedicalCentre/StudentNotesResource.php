<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\MedicalNote;
use spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\ArchiveStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\CreateStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\DeleteStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNotesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\PatchStudentNoteRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\RestoreStudentNoteRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentNotesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\IMedicalNote>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNotesRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentNotesRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\ArchiveStudentNoteRequest
     */
    public function archive(string $schoolId, string $noteId): Created
    {
        return $this->fetch(new ArchiveStudentNoteRequest(schoolId: $schoolId, noteId: $noteId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate|array<string, mixed>  $medicalNote
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\CreateStudentNoteRequest
     */
    public function create(string $schoolId, MedicalNoteForCreate|array $medicalNote): Created
    {
        return $this->fetch(new CreateStudentNoteRequest(schoolId: $schoolId, medicalNote: $medicalNote));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\DeleteStudentNoteRequest
     */
    public function delete(string $schoolId, string $noteId): void
    {
        $this->fetch(new DeleteStudentNoteRequest(schoolId: $schoolId, noteId: $noteId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\GetStudentNoteRequest
     */
    public function get(string $schoolId, string $noteId): MedicalNote
    {
        return $this->fetch(new GetStudentNoteRequest(schoolId: $schoolId, noteId: $noteId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\PatchStudentNoteRequest
     */
    public function patch(string $schoolId, string $noteId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentNoteRequest(schoolId: $schoolId, noteId: $noteId, patch: $patch));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentNotes\RestoreStudentNoteRequest
     */
    public function restore(string $schoolId, string $noteId): Created
    {
        return $this->fetch(new RestoreStudentNoteRequest(schoolId: $schoolId, noteId: $noteId));
    }
}
