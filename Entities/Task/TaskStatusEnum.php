<?php

namespace Modules\Task\Entities\Task;

enum TaskStatusEnum
{
    case closed;
    case open;
    case finalized;
    case abandoned;
    case in_progress;

    public static function toArray(): array
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
