<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Registration\RegistrationOffGame;
use spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate;
use spkm\IsamsApi\Requests\Registration\OffGames\CreateRegistrationOffGameRequest;
use spkm\IsamsApi\Requests\Registration\OffGames\GetRegistrationOffGamesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class OffGamesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Registration\RegistrationOffGame>
     * @see \spkm\IsamsApi\Requests\Registration\OffGames\GetRegistrationOffGamesRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetRegistrationOffGamesRequest(filter: $filter), RegistrationOffGame::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\RegistrationOffGameForCreate|array<string, mixed>  $registrationOffGame
     * @see \spkm\IsamsApi\Requests\Registration\OffGames\CreateRegistrationOffGameRequest
     */
    public function create(RegistrationOffGameForCreate|array $registrationOffGame): Created
    {
        return $this->fetch(new CreateRegistrationOffGameRequest(registrationOffGame: $registrationOffGame));
    }
}
