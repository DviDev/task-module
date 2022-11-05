<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskBoardTasksFactory;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksEntityModel;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskBoardTasksEntityModel toEntity()
 * @method TaskBoardTasksFactory factory()
 */
class TaskBoardTasksModel extends BaseModel
{
    use HasFactory;
    use TaskBoardTasksProps;

    public function modelEntity(): string
    {
        return TaskBoardTasksEntityModel::class;
    }

    protected static function newFactory(): TaskBoardTasksFactory
    {
        return new TaskBoardTasksFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_board_tasks', $alias);
    }
}
