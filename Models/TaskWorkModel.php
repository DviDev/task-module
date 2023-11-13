<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskWork\TaskWorkEntityModel;
use Modules\Task\Entities\TaskWork\TaskWorkProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskModel $task
 * @property-read User $user
 * @method TaskWorkEntityModel toEntity()
 */
class TaskWorkModel extends BaseModel
{
    use HasFactory;
    use TaskWorkProps;

    public function modelEntity(): string
    {
        return TaskWorkEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = TaskWorkModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_works', $alias);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(TaskModel::class, 'task_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
