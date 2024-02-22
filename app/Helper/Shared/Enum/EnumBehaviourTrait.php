<?php

namespace App\Helper\Shared\Enum;

trait EnumBehaviourTrait
{
    public function is($enumerator): bool
    {
        return $this === $enumerator || $this->value === $enumerator;
    }

    public function in(array $enumerators): bool
    {
        return in_array($this->getValue(), $enumerators, true);
    }

    public function getValue(): string|int
    {
        return $this->value;
    }
}
