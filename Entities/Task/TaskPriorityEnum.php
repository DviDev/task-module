<?php

namespace Modules\Task\Entities\Task;

enum TaskPriorityEnum
{
    case high;
    case normal;
    case low;

    public static function toArray(): array
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
