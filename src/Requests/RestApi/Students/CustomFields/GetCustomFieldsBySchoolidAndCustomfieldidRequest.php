<?php

namespace spkm\IsamsApi\Requests\RestApi\Students\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'customFields' property is an array of CustomField objects.
 *
 * The 'homeAddresses' property is
 * an array of HomeAddress objects.
 *
 * The 'gender' property is CensusGender enumeration.
 *
 * The
 * 'studentSource' property is StudentSource enumeration.
 */
class GetCustomFieldsBySchoolidAndCustomfieldidRequest extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/students/{$this->schoolId}/customFields/{$this->customFieldId}";
	}


	/**
	 * @param string $schoolId The unique identifier of a student to retrieve the custom fields for.
	 * @param int $customFieldId The identifier of a custom field associated with a student.
	 */
	public function __construct(
		protected string $schoolId,
		protected int $customFieldId,
	) {
	}
}
