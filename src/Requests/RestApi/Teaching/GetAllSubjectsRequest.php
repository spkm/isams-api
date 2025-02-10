<?php

namespace spkm\IsamsApi\Requests\RestApi\Teaching;;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'subjects' property is an array of Subject objects.
 */
class GetAllSubjectsRequest extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/teaching/subjects";
	}
}
