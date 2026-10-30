<?php

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\LazyCollection;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Request;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\IsamsConnector;

/**
 * The base of the generated resources: each method sends one request and returns what iSAMS sent, as models, throwing
 * an IsamsApiException when iSAMS returned an error. Isams::send() returns the raw response instead.
 */
abstract class IsamsResource extends BaseResource
{
    protected function fetch(Request $request): mixed
    {
        return $this->connector->send($request)->dto();
    }

    /**
     * Every item of a paged list as a model, fetching each page only when the loop reaches it.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    protected function each(Request $request, string $model): LazyCollection
    {
        /** @var IsamsConnector $connector */
        $connector = $this->connector;
        $paginator = $connector->paginate($request);

        return LazyCollection::make(function () use ($paginator, $model) {
            try {
                foreach ($paginator->models($model) as $item) {
                    yield $item;
                }
            } catch (RequestException $exception) {
                throw $exception instanceof IsamsApiException ? $exception : IsamsApiException::fromResponse($exception->getResponse());
            }
        });
    }
}
