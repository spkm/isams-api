<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Registration\RegistrationRule;
use spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRuleRequest;
use spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRulesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RulesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Registration\RegistrationRule>
     * @see \spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRulesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetRegistrationRulesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRuleRequest
     */
    public function get(int $id): RegistrationRule
    {
        return $this->fetch(new GetRegistrationRuleRequest(id: $id));
    }
}
