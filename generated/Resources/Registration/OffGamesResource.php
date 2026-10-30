<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate;
use spkm\IsamsApi\Requests\Registration\OffGames\CreateRegistrationOffGameRequest;
use spkm\IsamsApi\Requests\Registration\OffGames\GetRegistrationOffGamesRequest;

class OffGamesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate|array<string, mixed>  $registrationOffGame
     */
    public function createRegistrationOffGame(RegistrationOffGameForCreate|array $registrationOffGame): Response
    {
        return $this->connector->send(new CreateRegistrationOffGameRequest($registrationOffGame));
    }

    public function getRegistrationOffGames(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetRegistrationOffGamesRequest($page, $pageSize, $filter));
    }
}
