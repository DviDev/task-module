<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskWorkFactory;
use Modules\Task\Entities\TaskWork\TaskWorkEntityModel;
use Modules\Task\Entities\TaskWork\TaskWorkProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskWorkEntityModel toEntity()
 * @method static TaskWorkFactory factory()
 */
class TaskWorkModel extends BaseModel
{
    use HasFactory;
    use TaskWorkProps;

    public function modelEntity(): string
    {
        return TaskWorkEntityModel::class;
    }

    protected static function newFactory(): TaskWorkFactory
    {
        return new TaskWorkFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_works', $alias);
    }
}
