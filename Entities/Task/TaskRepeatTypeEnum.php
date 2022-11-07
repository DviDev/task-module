<?php

namespace Modules\Task\Entities\Task;

enum TaskRepeatTypeEnum
{
    case daily;
    case weekly;
    case monthly;
    case trimester;
    case quarterly;
    case semiannually;
    case annually;

    public static function toArray(): array
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
