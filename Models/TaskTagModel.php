<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskTag\TaskTagEntityModel;
use Modules\Task\Entities\TaskTag\TaskTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskModel $task
 * @method TaskTagEntityModel toEntity()
 */
class TaskTagModel extends BaseModel
{
    use HasFactory;
    use TaskTagProps;

    public function modelEntity(): string
    {
        return TaskTagEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = TaskTagModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_tags', $alias);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(TaskModel::class, 'task_id');
    }
}
