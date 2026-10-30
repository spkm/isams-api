<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Gradebooks\GradebookForCreate;
use spkm\IsamsApi\Requests\Gradebooks\CreateGradebookRequest;
use spkm\IsamsApi\Requests\Gradebooks\DeleteGradebookRequest;
use spkm\IsamsApi\Requests\Gradebooks\GetGradebookRequest;
use spkm\IsamsApi\Requests\Gradebooks\GetGradebookStructureRequest;
use spkm\IsamsApi\Requests\Gradebooks\GetGradebooksRequest;
use spkm\IsamsApi\Requests\Gradebooks\PatchGradebookRequest;
use spkm\IsamsApi\Resources\Gradebooks\AssessmentColumnIndicatorsResource;
use spkm\IsamsApi\Resources\Gradebooks\AssessmentColumnResource;
use spkm\IsamsApi\Resources\Gradebooks\AssessmentColumnTransposeResource;
use spkm\IsamsApi\Resources\Gradebooks\AssessmentColumnWeightingsResource;
use spkm\IsamsApi\Resources\Gradebooks\CalculationColumnResource;
use spkm\IsamsApi\Resources\Gradebooks\CalculationColumnTransposeResource;
use spkm\IsamsApi\Resources\Gradebooks\CalculationColumnWeightingsResource;
use spkm\IsamsApi\Resources\Gradebooks\CharacteristicsResource;
use spkm\IsamsApi\Resources\Gradebooks\ColumnMarksResource;
use spkm\IsamsApi\Resources\Gradebooks\ColumnReportMappingsResource;
use spkm\IsamsApi\Resources\Gradebooks\DisassociatedStudentResource;
use spkm\IsamsApi\Resources\Gradebooks\GradesetConfigurationResource;
use spkm\IsamsApi\Resources\Gradebooks\GroupResource;
use spkm\IsamsApi\Resources\Gradebooks\IndicatorConfigurationResource;
use spkm\IsamsApi\Resources\Gradebooks\MarkCommentsResource;
use spkm\IsamsApi\Resources\Gradebooks\MarksResource;
use spkm\IsamsApi\Resources\Gradebooks\StaffAllocationsResource;
use spkm\IsamsApi\Resources\Gradebooks\StaffAssignmentsResource;
use spkm\IsamsApi\Resources\Gradebooks\StaffResource;
use spkm\IsamsApi\Resources\Gradebooks\StudentAllocationsResource;
use spkm\IsamsApi\Resources\Gradebooks\StudentAssignmentsResource;
use spkm\IsamsApi\Resources\Gradebooks\StudentExclusionsResource;
use spkm\IsamsApi\Resources\Gradebooks\StudentResource;
use spkm\IsamsApi\Resources\Gradebooks\StylingDesignConfigurationResource;
use spkm\IsamsApi\Resources\Gradebooks\StylingRuleConfigurationResource;
use spkm\IsamsApi\Resources\Gradebooks\TagsResource;
use spkm\IsamsApi\Resources\Gradebooks\TransposeConfigurationResource;
use spkm\IsamsApi\Resources\Gradebooks\WeightingConfigurationResource;
use spkm\IsamsApi\Support\JsonPatch;

class GradebooksResource extends BaseResource
{
    public function assessmentColumn(): AssessmentColumnResource
    {
        return new AssessmentColumnResource($this->connector);
    }

    public function assessmentColumnIndicators(): AssessmentColumnIndicatorsResource
    {
        return new AssessmentColumnIndicatorsResource($this->connector);
    }

    public function assessmentColumnTranspose(): AssessmentColumnTransposeResource
    {
        return new AssessmentColumnTransposeResource($this->connector);
    }

    public function assessmentColumnWeightings(): AssessmentColumnWeightingsResource
    {
        return new AssessmentColumnWeightingsResource($this->connector);
    }

    public function calculationColumn(): CalculationColumnResource
    {
        return new CalculationColumnResource($this->connector);
    }

    public function calculationColumnTranspose(): CalculationColumnTransposeResource
    {
        return new CalculationColumnTransposeResource($this->connector);
    }

    public function calculationColumnWeightings(): CalculationColumnWeightingsResource
    {
        return new CalculationColumnWeightingsResource($this->connector);
    }

    public function characteristics(): CharacteristicsResource
    {
        return new CharacteristicsResource($this->connector);
    }

    public function columnMarks(): ColumnMarksResource
    {
        return new ColumnMarksResource($this->connector);
    }

    public function columnReportMappings(): ColumnReportMappingsResource
    {
        return new ColumnReportMappingsResource($this->connector);
    }

    public function disassociatedStudent(): DisassociatedStudentResource
    {
        return new DisassociatedStudentResource($this->connector);
    }

    public function gradesetConfiguration(): GradesetConfigurationResource
    {
        return new GradesetConfigurationResource($this->connector);
    }

    public function group(): GroupResource
    {
        return new GroupResource($this->connector);
    }

    public function indicatorConfiguration(): IndicatorConfigurationResource
    {
        return new IndicatorConfigurationResource($this->connector);
    }

    public function markComments(): MarkCommentsResource
    {
        return new MarkCommentsResource($this->connector);
    }

    public function marks(): MarksResource
    {
        return new MarksResource($this->connector);
    }

    public function staff(): StaffResource
    {
        return new StaffResource($this->connector);
    }

    public function staffAllocations(): StaffAllocationsResource
    {
        return new StaffAllocationsResource($this->connector);
    }

    public function staffAssignments(): StaffAssignmentsResource
    {
        return new StaffAssignmentsResource($this->connector);
    }

    public function student(): StudentResource
    {
        return new StudentResource($this->connector);
    }

    public function studentAllocations(): StudentAllocationsResource
    {
        return new StudentAllocationsResource($this->connector);
    }

    public function studentAssignments(): StudentAssignmentsResource
    {
        return new StudentAssignmentsResource($this->connector);
    }

    public function studentExclusions(): StudentExclusionsResource
    {
        return new StudentExclusionsResource($this->connector);
    }

    public function stylingDesignConfiguration(): StylingDesignConfigurationResource
    {
        return new StylingDesignConfigurationResource($this->connector);
    }

    public function stylingRuleConfiguration(): StylingRuleConfigurationResource
    {
        return new StylingRuleConfigurationResource($this->connector);
    }

    public function tags(): TagsResource
    {
        return new TagsResource($this->connector);
    }

    public function transposeConfiguration(): TransposeConfigurationResource
    {
        return new TransposeConfigurationResource($this->connector);
    }

    public function weightingConfiguration(): WeightingConfigurationResource
    {
        return new WeightingConfigurationResource($this->connector);
    }

    public function all(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetGradebooksRequest($filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GradebookForCreate|array<string, mixed>  $gradebook
     */
    public function create(GradebookForCreate|array $gradebook): Response
    {
        return $this->connector->send(new CreateGradebookRequest($gradebook));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteGradebookRequest($id));
    }

    public function get(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookRequest($gradebookId));
    }

    public function getStructure(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStructureRequest($gradebookId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchGradebookRequest($id, $patch));
    }
}
