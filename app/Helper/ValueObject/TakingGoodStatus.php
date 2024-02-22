<?php

namespace App\Helper\ValueObject;

use App\Helper\Shared\Enum\EnumBehaviourTrait;

enum TakingGoodStatus: string
{
    use EnumBehaviourTrait;

    case OPEN = 'open';
    case APPROVE = 'approve';
    case REJECT = 'reject';
}
