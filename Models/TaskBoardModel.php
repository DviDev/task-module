<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Entities\TaskBoard\TaskBoardProps;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskModel $task
 *
 * @method TaskBoardEntityModel toEntity()
 */
class TaskBoardModel extends BaseModel
{
    use HasFactory;
    use TaskBoardProps;

    public function modelEntity(): string
    {
        return TaskBoardEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = TaskBoardModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_boards', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(TaskModel::class, TaskBoardTasksModel::class, 'board_id', 'task_id');
    }
}
