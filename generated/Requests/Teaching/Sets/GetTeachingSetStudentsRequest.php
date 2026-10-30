<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Sets;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\Student;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all students in a set.
 *
 * GET /api/teaching/sets/{setId}/setList
 */
class GetTeachingSetStudentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Student::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $setId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/sets/'.rawurlencode((string) $this->setId).'/setList';
    }
}
