<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksEntityModel;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskBoardModel $board
 * @property-read TaskModel $task
 * @method TaskBoardTasksEntityModel toEntity()
 */
class TaskBoardTasksModel extends BaseModel
{
    use HasFactory;
    use TaskBoardTasksProps;

    public function modelEntity(): string
    {
        return TaskBoardTasksEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = TaskBoardTasksModel::class;
        };
    }
    public static function table($alias = null): string
    {
        return self::dbTable('task_board_tasks', $alias);
    }

    public function board(): BelongsTo
    {
        return $this->belongsTo(TaskBoardModel::class, 'board_id');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(TaskModel::class, 'task_id');
    }
}
