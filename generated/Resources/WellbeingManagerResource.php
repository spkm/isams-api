<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\WellbeingManager\AgencyResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernActionOutcomesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernActionStatusesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernActionTypesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernActionsResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernAreasResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernDocumentsResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernGirfecResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernInjuryTypesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernRolesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernSeveritiesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernStatusesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernStudentsResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernTypesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernVisibilitiesResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConcernsResource;
use spkm\IsamsApi\Resources\WellbeingManager\ConfigurationResource;
use spkm\IsamsApi\Resources\WellbeingManager\FlagResource;
use spkm\IsamsApi\Resources\WellbeingManager\FlagTypesResource;
use spkm\IsamsApi\Resources\WellbeingManager\FrameworkResource;
use spkm\IsamsApi\Resources\WellbeingManager\GirfecAreasResource;
use spkm\IsamsApi\Resources\WellbeingManager\IndicatorStatusesResource;
use spkm\IsamsApi\Resources\WellbeingManager\IndicatorsResource;
use spkm\IsamsApi\Resources\WellbeingManager\LifeEventTypesResource;
use spkm\IsamsApi\Resources\WellbeingManager\LifeEventsResource;
use spkm\IsamsApi\Resources\WellbeingManager\ReasonsForDismissalResource;
use spkm\IsamsApi\Resources\WellbeingManager\StudentConcernsResource;
use spkm\IsamsApi\Resources\WellbeingManager\VisibilityGroupsResource;
use spkm\IsamsApi\Resources\WellbeingManager\WorkflowActionsResource;
use spkm\IsamsApi\Resources\WellbeingManager\WorkflowRulesResource;
use spkm\IsamsApi\Resources\WellbeingManager\WorkflowsResource;

class WellbeingManagerResource extends BaseResource
{
    public function agency(): AgencyResource
    {
        return new AgencyResource($this->connector);
    }

    public function concernActionOutcomes(): ConcernActionOutcomesResource
    {
        return new ConcernActionOutcomesResource($this->connector);
    }

    public function concernActionStatuses(): ConcernActionStatusesResource
    {
        return new ConcernActionStatusesResource($this->connector);
    }

    public function concernActionTypes(): ConcernActionTypesResource
    {
        return new ConcernActionTypesResource($this->connector);
    }

    public function concernActions(): ConcernActionsResource
    {
        return new ConcernActionsResource($this->connector);
    }

    public function concernAreas(): ConcernAreasResource
    {
        return new ConcernAreasResource($this->connector);
    }

    public function concernDocuments(): ConcernDocumentsResource
    {
        return new ConcernDocumentsResource($this->connector);
    }

    public function concernGirfec(): ConcernGirfecResource
    {
        return new ConcernGirfecResource($this->connector);
    }

    public function concernInjuryTypes(): ConcernInjuryTypesResource
    {
        return new ConcernInjuryTypesResource($this->connector);
    }

    public function concernRoles(): ConcernRolesResource
    {
        return new ConcernRolesResource($this->connector);
    }

    public function concernSeverities(): ConcernSeveritiesResource
    {
        return new ConcernSeveritiesResource($this->connector);
    }

    public function concernStatuses(): ConcernStatusesResource
    {
        return new ConcernStatusesResource($this->connector);
    }

    public function concernStudents(): ConcernStudentsResource
    {
        return new ConcernStudentsResource($this->connector);
    }

    public function concernTypes(): ConcernTypesResource
    {
        return new ConcernTypesResource($this->connector);
    }

    public function concernVisibilities(): ConcernVisibilitiesResource
    {
        return new ConcernVisibilitiesResource($this->connector);
    }

    public function concerns(): ConcernsResource
    {
        return new ConcernsResource($this->connector);
    }

    public function configuration(): ConfigurationResource
    {
        return new ConfigurationResource($this->connector);
    }

    public function flag(): FlagResource
    {
        return new FlagResource($this->connector);
    }

    public function flagTypes(): FlagTypesResource
    {
        return new FlagTypesResource($this->connector);
    }

    public function framework(): FrameworkResource
    {
        return new FrameworkResource($this->connector);
    }

    public function girfecAreas(): GirfecAreasResource
    {
        return new GirfecAreasResource($this->connector);
    }

    public function indicatorStatuses(): IndicatorStatusesResource
    {
        return new IndicatorStatusesResource($this->connector);
    }

    public function indicators(): IndicatorsResource
    {
        return new IndicatorsResource($this->connector);
    }

    public function lifeEventTypes(): LifeEventTypesResource
    {
        return new LifeEventTypesResource($this->connector);
    }

    public function lifeEvents(): LifeEventsResource
    {
        return new LifeEventsResource($this->connector);
    }

    public function reasonsForDismissal(): ReasonsForDismissalResource
    {
        return new ReasonsForDismissalResource($this->connector);
    }

    public function studentConcerns(): StudentConcernsResource
    {
        return new StudentConcernsResource($this->connector);
    }

    public function visibilityGroups(): VisibilityGroupsResource
    {
        return new VisibilityGroupsResource($this->connector);
    }

    public function workflowActions(): WorkflowActionsResource
    {
        return new WorkflowActionsResource($this->connector);
    }

    public function workflowRules(): WorkflowRulesResource
    {
        return new WorkflowRulesResource($this->connector);
    }

    public function workflows(): WorkflowsResource
    {
        return new WorkflowsResource($this->connector);
    }
}
