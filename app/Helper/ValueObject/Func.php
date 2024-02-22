<?php

namespace App\Helper\ValueObject;

use App\Helper\Shared\Enum\EnumBehaviourTrait;

enum Func: string
{
    use EnumBehaviourTrait;

    case DEFAULT = 'handle';
}
