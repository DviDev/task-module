<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Models\BaseModel;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Database\Factories\TaskFactory;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\Task\TaskProps;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read User $owner
 * @property-read ProjectModel $project
 * @property-read WorkspaceModel $workspace
 * @property-read User $recipient
 * @method TaskEntityModel toEntity()
 * @method static TaskFactory factory()
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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_user_id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TaskBoardTaskHistoryModel::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(TaskCategoryModel::class, 'task_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(TaskTagModel::class, 'task_id');
    }
}
