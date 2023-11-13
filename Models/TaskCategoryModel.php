<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Entities\TaskCategory\TaskCategoryEntityModel;
use Modules\Task\Entities\TaskCategory\TaskCategoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ProjectModel $project
 * @property-read User $user
 * @method TaskCategoryEntityModel toEntity()
 */
class TaskCategoryModel extends BaseModel
{
    use HasFactory;
    use TaskCategoryProps;

    public function modelEntity(): string
    {
        return TaskCategoryEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = TaskCategoryModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_categories', $alias);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'task_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
