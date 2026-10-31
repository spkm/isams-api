<?php

namespace spkm\IsamsApi\Generator;

/**
 * Builds everything in generated/, generator/manifest.json and ENDPOINTS.md: the REST API's requests, models and
 * resources from iSAMS's pinned spec (generator/spec), the Batch API's models and groups from its node lists
 * (generator/batch/nodes.php), both corrected by generator/overrides.php. Run by bin/generate.
 */
final class Generator
{
    private readonly RestGenerator $rest;

    private readonly BatchGenerator $batch;

    /**
     * @param  Corrections|null  $corrections  the corrections to apply instead of generator/overrides.php's
     */
    public function __construct(string $root, ?Corrections $corrections = null)
    {
        $corrections ??= Corrections::load($root);
        $this->rest = new RestGenerator(new ApiSpec($root, $corrections->properties()), $corrections);
        $this->batch = new BatchGenerator($root, $corrections);
    }

    /**
     * Every built file, keyed by its path relative to the package root.
     *
     * @return array<string, string>
     */
    public function build(): array
    {
        $files = $this->rest->build() + $this->batch->build();
        $files['ENDPOINTS.md'] = (new EndpointsDocument)->render($this->rest->calls(), $this->batch->calls());
        ksort($files);

        return $files;
    }
}
