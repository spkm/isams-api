<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\OffGames;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a registration Off games entry.
 *
 * POST /api/registration/offgames
 */
#[Beta]
class CreateRegistrationOffGameRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate|array<string, mixed>  $registrationOffGame
     */
    public function __construct(
        protected RegistrationOffGameForCreate|array $registrationOffGame,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/offgames';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->registrationOffGame instanceof Data ? $this->registrationOffGame->toArray() : $this->registrationOffGame;
    }
}
