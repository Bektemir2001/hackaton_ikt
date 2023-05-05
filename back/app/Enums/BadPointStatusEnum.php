<?php

namespace App\Enums;

enum BadPointStatusEnum:string
{
    case not_viewed = 'not_viewed';
    case planned = 'planned';
    case repairing = 'repairing';
    case completed = 'completed';
}
