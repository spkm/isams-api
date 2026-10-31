<?php

namespace spkm\IsamsApi\Generator\Emit;

use Illuminate\Support\Str;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

/**
 * The files a generator builds, each headed by its marker, printed and keyed by its path relative to the package root.
 */
final class PhpFiles
{
    /** @var array<string, string> path => contents */
    private array $files = [];

    public function __construct(private readonly string $marker) {}

    /**
     * A file in a namespace, headed by the marker.
     *
     * @return array{PhpNamespace, PhpFile}
     */
    public function start(string $namespace): array
    {
        $file = new PhpFile;
        $file->addComment($this->marker);

        return [$file->addNamespace($namespace), $file];
    }

    /**
     * Adds a class's file, printed.
     */
    public function add(string $class, PhpFile $file): void
    {
        $this->files[self::pathFor($class)] = (new PsrPrinter)->printFile($file);
    }

    /**
     * Claims a class's path before its file is built, so a class built while building the classes it holds is built
     * once.
     */
    public function reserve(string $class): void
    {
        $this->files[self::pathFor($class)] = '';
    }

    public function has(string $class): bool
    {
        return isset($this->files[self::pathFor($class)]);
    }

    /**
     * Adds a file that is not a class, by its path.
     */
    public function put(string $path, string $contents): void
    {
        $this->files[$path] = $contents;
    }

    /**
     * Every file, sorted by path.
     *
     * @return array<string, string>
     */
    public function all(): array
    {
        $files = $this->files;
        ksort($files);

        return $files;
    }

    public static function pathFor(string $class): string
    {
        return 'generated/'.str_replace('\\', '/', Str::after($class, 'spkm\IsamsApi\\')).'.php';
    }
}
