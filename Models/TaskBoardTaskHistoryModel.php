<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryEntityModel;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method TaskBoardTaskHistoryEntityModel toEntity()
 */
class TaskBoardTaskHistoryModel extends BaseModel
{
    use HasFactory;
    use TaskBoardTaskHistoryProps;

    public function modelEntity(): string
    {
        return TaskBoardTaskHistoryEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = TaskBoardTaskHistoryModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_histories', $alias);
    }
}
