<?php

namespace spkm\IsamsApi\Generator;

use Nette\PhpGenerator\Method;
use spkm\IsamsApi\Generator\Emit\FacadeEmitter;
use spkm\IsamsApi\Generator\Emit\ModelEmitter;
use spkm\IsamsApi\Generator\Emit\PhpFiles;
use spkm\IsamsApi\Generator\Emit\RequestEmitter;
use spkm\IsamsApi\Generator\Emit\ResourceEmitter;
use spkm\IsamsApi\Generator\Naming\ModelNaming;
use spkm\IsamsApi\Generator\Naming\RequestNaming;
use spkm\IsamsApi\Generator\Naming\ResourceNaming;

/**
 * Builds the REST API's part of generated/: the request, model, enum and resource classes from iSAMS's pinned API spec
 * (generator/spec), corrected by generator/overrides.php, recording each operation in generator/manifest.json.
 */
final class RestGenerator
{
    private const MARKER = 'Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.';

    /** @var array<string, array<string, mixed>> */
    private array $manifest = [];

    private readonly RequestNaming $requestNaming;

    private readonly ModelNaming $modelNaming;

    private readonly ResourceNaming $resourceNaming;

    private readonly ModelRegistry $models;

    private readonly Operations $operations;

    private readonly PhpFiles $files;

    private readonly RequestEmitter $requestEmitter;

    private readonly ModelEmitter $modelEmitter;

    private readonly ResourceEmitter $resourceEmitter;

    private readonly FacadeEmitter $facadeEmitter;

    public function __construct(private readonly ApiSpec $spec, private readonly Corrections $corrections)
    {
        $this->requestNaming = new RequestNaming($spec, $corrections);
        $this->modelNaming = new ModelNaming($spec, $corrections);
        $this->resourceNaming = new ResourceNaming($corrections, $this->requestNaming);
        $this->models = new ModelRegistry($this->modelNaming);
        $this->operations = new Operations($spec, $corrections, $this->requestNaming, $this->models);
        $this->files = new PhpFiles(self::MARKER);
        $this->requestEmitter = new RequestEmitter($this->files);
        $this->modelEmitter = new ModelEmitter($this->files, $spec, $this->models, $this->modelNaming);
        $this->resourceEmitter = new ResourceEmitter($this->files, $this->resourceNaming);
        $this->facadeEmitter = new FacadeEmitter($this->files);
    }

    /**
     * Every generated file, keyed by its path relative to the package root.
     *
     * @return array<string, string>
     */
    public function build(): array
    {
        $this->corrections->validateAgainst($this->spec);
        $this->modelNaming->nameEnums();

        foreach ($this->operations->all() as $operation) {
            $this->manifest[$operation['id']] = array_filter([
                'method' => strtoupper($operation['method']),
                'path' => $operation['path'],
                'source' => $operation['source'],
                'class' => $operation['class'] ?? null,
                'model' => $operation['source'] === 'handwritten' ? $operation['response']['model'] : null,
                'reason' => $operation['reason'] ?? null,
                'apiVersion' => $operation['apiVersion'],
            ]);

            if ($operation['source'] === 'generated') {
                $this->requestEmitter->emit($operation);
            }

            if (in_array($operation['source'], ['generated', 'handwritten'], true)) {
                $this->resourceEmitter->add($operation);
            }
        }

        foreach ($this->models->drain() as $definition) {
            $this->modelEmitter->emit($definition);
        }

        $this->resourceEmitter->emit();
        $this->facadeEmitter->emit($this->resourceEmitter->areas());

        ksort($this->manifest);
        $this->files->put('generator/manifest.json', json_encode(['operations' => $this->manifest, 'models' => $this->models->all()], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."\n");

        return $this->files->all();
    }

    /**
     * What ENDPOINTS.md lists for the REST API, once built: the areas' resource classes, their child resources and their
     * methods.
     *
     * @return array{areas: list<string>, children: array<string, array<string, string>>, calls: array<string, list<Method>>}
     */
    public function calls(): array
    {
        return ['areas' => $this->resourceEmitter->areas(), 'children' => $this->resourceEmitter->children(), 'calls' => $this->resourceEmitter->calls()];
    }
}
