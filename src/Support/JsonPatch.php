<?php

namespace spkm\IsamsApi\Support;

use JsonSerializable;

final class JsonPatch implements JsonSerializable
{
    /** @var list<array<string, mixed>> */
    private array $operations = [];

    public static function make(): static
    {
        return new self;
    }

    public function add(string $path, mixed $value): static
    {
        return $this->operation(['op' => 'add', 'path' => $path, 'value' => $value]);
    }

    public function replace(string $path, mixed $value): static
    {
        return $this->operation(['op' => 'replace', 'path' => $path, 'value' => $value]);
    }

    public function remove(string $path): static
    {
        return $this->operation(['op' => 'remove', 'path' => $path]);
    }

    public function move(string $from, string $path): static
    {
        return $this->operation(['op' => 'move', 'from' => $from, 'path' => $path]);
    }

    public function copy(string $from, string $path): static
    {
        return $this->operation(['op' => 'copy', 'from' => $from, 'path' => $path]);
    }

    public function test(string $path, mixed $value): static
    {
        return $this->operation(['op' => 'test', 'path' => $path, 'value' => $value]);
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function toArray(): array
    {
        return $this->operations;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function jsonSerialize(): array
    {
        return $this->operations;
    }

    /**
     * @param  array<string, mixed>  $operation
     */
    private function operation(array $operation): static
    {
        $this->operations[] = $operation;

        return $this;
    }
}
