<?php

namespace spkm\IsamsApi\Requests\RestApi\Students;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'homeAddresses' property is an array of HomeAddress objects.
 *
 * The 'systemStatus' property is
 * SystemStatus enumeration.
 *
 * The 'gender' property is CensusGender enumeration.
 *
 * The
 * 'removalGrounds' property is RemovalGrounds object.
 *
 * The 'languageIsoMappings' and
 * 'nationalityIsoMappings' properties are arrays of IsoMapping objects.
 */
class GetStudentBySchoolidRequest extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/students/{$this->schoolId}";
	}


	/**
	 * @param string $schoolId The unique identifier of a student to retrieve.
	 * @param null|mixed $expand Possible values:
	 *
	 * `customFields` - include student's custom fields.
	 *
	 * `languageIsoMappings` - include iso mappings for languages.
	 *
	 * `nationalityIsoMappings` - include iso mappings for nationalities.
	 */
	public function __construct(
		protected string $schoolId,
		protected mixed $expand = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand' => $this->expand]);
	}
}
