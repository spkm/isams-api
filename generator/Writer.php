<?php

namespace spkm\IsamsApi\Generator;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Brings the files the generators manage into line with what they built: writes the files that changed, deletes the
 * ones they no longer build, and removes the directories that leaves empty. Run by bin/generate.
 */
final class Writer
{
    /**
     * The files the generators write outside generated/.
     */
    private const OUTSIDE_GENERATED = ['generator/manifest.json', 'ENDPOINTS.md'];

    public function __construct(private readonly string $root) {}

    /**
     * Every file the generators manage that is on disk, relative to the package root.
     *
     * @return list<string>
     */
    public function managed(): array
    {
        $paths = array_values(array_filter(self::OUTSIDE_GENERATED, fn (string $path) => is_file($this->root.'/'.$path)));

        foreach ($this->generated(RecursiveIteratorIterator::LEAVES_ONLY) as $file) {
            $paths[] = substr($file->getPathname(), strlen($this->root) + 1);
        }

        sort($paths);

        return $paths;
    }

    /**
     * What writing the built files would change, without changing anything.
     *
     * @param  array<string, string>  $files  path relative to the package root => contents
     * @return array{changed: list<string>, removed: list<string>}
     */
    public function plan(array $files): array
    {
        ksort($files);

        return [
            'changed' => array_keys(array_filter($files, fn (string $contents, string $path) => ! is_file($this->root.'/'.$path) || file_get_contents($this->root.'/'.$path) !== $contents, ARRAY_FILTER_USE_BOTH)),
            'removed' => array_values(array_diff($this->managed(), array_keys($files))),
        ];
    }

    /**
     * Writes the built files that changed, deletes the managed files no longer built, and removes empty directories.
     *
     * @param  array<string, string>  $files  path relative to the package root => contents
     * @return array{changed: list<string>, removed: list<string>}
     */
    public function write(array $files): array
    {
        $plan = $this->plan($files);

        foreach ($plan['removed'] as $path) {
            unlink($this->root.'/'.$path);
        }

        foreach ($plan['changed'] as $path) {
            if (! is_dir(dirname($this->root.'/'.$path))) {
                mkdir(dirname($this->root.'/'.$path), 0755, true);
            }

            file_put_contents($this->root.'/'.$path, $files[$path]);
        }

        foreach ($this->generated(RecursiveIteratorIterator::CHILD_FIRST) as $directory) {
            if ($directory->isDir() && ! (new FilesystemIterator($directory->getPathname()))->valid()) {
                rmdir($directory->getPathname());
            }
        }

        return $plan;
    }

    /**
     * What is in generated/, in the given order; nothing when it doesn't exist yet.
     *
     * @param  RecursiveIteratorIterator::LEAVES_ONLY|RecursiveIteratorIterator::CHILD_FIRST  $mode
     * @return iterable<SplFileInfo>
     */
    private function generated(int $mode): iterable
    {
        if (! is_dir($this->root.'/generated')) {
            return [];
        }

        return new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->root.'/generated', FilesystemIterator::SKIP_DOTS), $mode);
    }
}
