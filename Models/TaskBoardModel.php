<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskBoardFactory;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Entities\TaskBoard\TaskBoardProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskModel $task
 * @method TaskBoardEntityModel toEntity()
 * @method static TaskBoardFactory factory()
 */
class TaskBoardModel extends BaseModel
{
    use HasFactory;
    use TaskBoardProps;

    public function modelEntity(): string
    {
        return TaskBoardEntityModel::class;
    }

    protected static function newFactory(): TaskBoardFactory
    {
        return new TaskBoardFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_boards', $alias);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(TaskModel::class, 'task_id');
    }
}
