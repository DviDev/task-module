<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskFactory;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\Task\TaskProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskEntityModel toEntity()
 * @method TaskFactory factory()
 */
class TaskModel extends BaseModel
{
    use HasFactory;
    use TaskProps;

    public function modelEntity(): string
    {
        return TaskEntityModel::class;
    }

    protected static function newFactory(): TaskFactory
    {
        return new TaskFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('tasks', $alias);
    }
}
