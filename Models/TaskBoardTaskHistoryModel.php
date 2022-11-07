<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskBoardTaskHistoryFactory;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryEntityModel;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskBoardTaskHistoryEntityModel toEntity()
 * @method static TaskBoardTaskHistoryFactory factory()
 */
class TaskBoardTaskHistoryModel extends BaseModel
{
    use HasFactory;
    use TaskBoardTaskHistoryProps;

    public function modelEntity(): string
    {
        return TaskBoardTaskHistoryEntityModel::class;
    }

    protected static function newFactory(): TaskBoardTaskHistoryFactory
    {
        return new TaskBoardTaskHistoryFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_board_task_histories', $alias);
    }
}
