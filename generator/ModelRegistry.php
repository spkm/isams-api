<?php

namespace spkm\IsamsApi\Generator;

use RuntimeException;
use spkm\IsamsApi\Generator\Naming\ModelNaming;

/**
 * The definitions that need a model, found as the operations' responses and bodies and the models' own properties refer
 * to them, each with its class.
 */
final class ModelRegistry
{
    /** @var array<string, string> definition => model class */
    private array $models = [];

    /** @var list<string> definitions whose models are still to be emitted */
    private array $queue = [];

    public function __construct(private readonly ModelNaming $naming) {}

    /**
     * Registers a definition's model, returning its class.
     */
    public function register(string $definition): string
    {
        if (! isset($this->models[$definition])) {
            $class = $this->naming->modelClass($definition);
            $taken = array_search($class, $this->models, true);

            if ($taken !== false) {
                throw new RuntimeException("$definition and $taken would both be $class; add a \"models\" override for one of them.");
            }

            $this->models[$definition] = $class;
            $this->queue[] = $definition;
        }

        return $this->models[$definition];
    }

    public function classFor(string $definition): string
    {
        return $this->models[$definition];
    }

    /**
     * Every registered definition and its class, sorted.
     *
     * @return array<string, string>
     */
    public function all(): array
    {
        $models = $this->models;
        ksort($models);

        return $models;
    }

    /**
     * The definitions whose models are still to be emitted, each once, including those registered meanwhile.
     *
     * @return iterable<string>
     */
    public function drain(): iterable
    {
        while (($definition = array_shift($this->queue)) !== null) {
            yield $definition;
        }
    }
}
