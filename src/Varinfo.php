<?php
namespace PhF\Varinfo;

/**
 * Description of a variable
 */
class Varinfo
{
    private $variable;

    public function __construct(
        &$variable
    ) {
        $this->variable = &$variable;
    }

    public function __toString(): string
    {
        if (\is_null($this->variable)) {
            return 'null';
        } elseif (\is_bool($this->variable)) {
            return $this->variable ? 'true' : 'false';
        } elseif (\is_int($this->variable)) {
            return 'integer(' . (string)$this->variable . ')';
        } elseif (\is_float($this->variable)) {
            return 'float(' . (string)$this->variable . ')';
        } elseif (\is_string($this->variable)) {
            return 'string(' . \strlen($this->variable) . ')';
        } elseif (\is_array($this->variable)) {
            return 'array('. \count($this->variable) . ')';
        } elseif (\is_resource($this->variable)) {
            return 'resource(' . get_resource_type($this->variable) . ')';
        } elseif (\is_object($this->variable)) {
            return \get_class($this->variable);
        }

        // don't break on future types
        return 'unknown'; // @codeCoverageIgnore
    }
}
