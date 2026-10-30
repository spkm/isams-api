<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\OffGames;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Registration\RegistrationOffGame;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all registration Off games.
 *
 * GET /api/registration/offgames
 */
#[Beta]
class GetRegistrationOffGamesRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RegistrationOffGame::class;
    public string $resultKey = 'registrationOffGames';

    public function __construct(
        protected ?int $page = null,
        protected ?int $pageSize = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/offgames';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
