<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRuleRequest;
use spkm\IsamsApi\Requests\Registration\Rules\GetRegistrationRulesRequest;

class RulesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetRegistrationRulesRequest());
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetRegistrationRuleRequest($id));
    }
}
