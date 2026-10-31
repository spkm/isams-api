<?php

namespace spkm\IsamsApi\Generator\Emit;

use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;

/**
 * Writes the Isams facade, hinting each area's resource and the service's and connector's own methods for IDEs.
 */
final class FacadeEmitter
{
    public function __construct(private readonly PhpFiles $files) {}

    /**
     * The Isams facade, with a hint for each area and for the service's and connector's own methods, so IDEs can
     * autocomplete Isams::.
     *
     * @param  list<string>  $areas
     */
    public function emit(array $areas): void
    {
        [$namespace, $file] = $this->files->start('spkm\IsamsApi\Facades');
        $namespace->addUse('Illuminate\Support\Facades\Facade');
        $class = $namespace->addClass('Isams')->setExtends('Illuminate\Support\Facades\Facade');

        foreach ($areas as $area) {
            $class->addComment('@method static \\'.$area.' '.lcfirst((string) preg_replace('/Resource$/', '', class_basename($area))).'()');
        }

        $methods = [
            ...array_filter((new ReflectionClass('spkm\IsamsApi\IsamsService'))->getMethods(ReflectionMethod::IS_PUBLIC), fn (ReflectionMethod $method) => ! str_starts_with($method->getName(), '__')),
            ...array_map(fn (string $name) => new ReflectionMethod('spkm\IsamsApi\IsamsConnector', $name), ['send', 'paginate', 'paginateEndpoint', 'get', 'post', 'put', 'patch', 'delete']),
        ];

        foreach ($methods as $method) {
            $class->addComment('@method static '.$this->hintReturnType($method).' '.$method->getName().'('.implode(', ', array_map($this->hintParameter(...), $method->getParameters())).')');
        }

        $class->addMethod('getFacadeAccessor')->setProtected()->setStatic()->setReturnType('string')->setBody("return 'isams';");
        $this->files->add('spkm\IsamsApi\Facades\Isams', $file);
    }

    private function hintReturnType(ReflectionMethod $method): string
    {
        return preg_match('/@return\\s+(\\S+)/', (string) $method->getDocComment(), $matches)
            ? $this->qualify($matches[1], $method)
            : $this->hintType($method->getReturnType());
    }

    private function hintParameter(ReflectionParameter $parameter): string
    {
        $method = $parameter->getDeclaringFunction();
        $documented = $method instanceof ReflectionMethod && preg_match('/@param\\s+(.+?)\\s+\\$'.$parameter->getName().'\\b/', (string) $method->getDocComment(), $matches)
            ? $this->qualify($matches[1], $method)
            : null;
        $type = $documented ?? ($parameter->getType() === null ? null : $this->hintType($parameter->getType()));
        $default = '';

        if ($parameter->isDefaultValueAvailable()) {
            $value = $parameter->getDefaultValue();
            $default = ' = '.match (true) {
                $value === null => 'null',
                $value === [] => '[]',
                is_array($value) => '['.implode(', ', array_map(fn (mixed $item) => var_export($item, true), $value)).']',
                default => var_export($value, true),
            };
        }

        return ($type === null ? '' : $type.' ').'$'.$parameter->getName().$default;
    }

    private function hintType(?ReflectionType $type): string
    {
        $types = $type instanceof ReflectionUnionType ? $type->getTypes() : ($type === null ? [] : [$type]);
        $names = array_map(fn (ReflectionNamedType $named) => $named->isBuiltin() ? $named->getName() : '\\'.$named->getName(), array_filter($types, fn ($named) => $named instanceof ReflectionNamedType));
        $hint = implode('|', $names) ?: 'mixed';

        return $type?->allowsNull() && ! in_array('null', $names, true) && $hint !== 'mixed' ? '?'.$hint : $hint;
    }

    /**
     * A docblock type with its class names made absolute: they name a class in the declaring class's namespace, an
     * imported global class, or a full name.
     */
    private function qualify(string $type, ReflectionMethod $method): string
    {
        return implode('|', array_map(function (string $part) use ($method) {
            $name = ltrim($part, '\\');
            $local = $method->getDeclaringClass()->getNamespaceName().'\\'.$name;

            return match (true) {
                str_contains($part, '<') || ctype_lower($part[0]) => $part,
                class_exists($local) || interface_exists($local) => '\\'.$local,
                default => '\\'.$name,
            };
        }, explode('|', $type)));
    }
}
