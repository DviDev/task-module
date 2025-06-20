<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Base\Models\RecordModel;
use Modules\Post\Models\ThreadModel;
use Modules\Post\Services\Message\HasMessage;
use Modules\Project\Models\ProjectSprintModel;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\Task\TaskProps;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read User $owner
 * @property-read RecordModel $entity
 * @property-read WorkspaceModel $workspace
 * @property-read User $recipient
 *
 * @method TaskEntityModel toEntity()
 */
class TaskModel extends BaseModel
{
    use HasFactory;
    use HasMessage;
    use TaskProps;

    protected $casts = [
        'active' => 'boolean',
        'start_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (TaskModel $task) {
            $task->thread_id = $task->thread_id ?: ThreadModel::query()->create([
                'content' => $task->name,
                'user_id' => auth()->user()->id,
            ])->id;
            $task->record_id = $task->record_id ?: RecordModel::query()->create([
                'name' => $task->name,
            ])->id;
        });
    }

    public function getActiveAttribute()
    {
        if (! $this->attributes['active']) {
            return null;
        }

        return true;
    }

    public function modelEntity(): string
    {
        return TaskEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = TaskModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('tasks', $alias);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
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
        return $this->hasMany(ProjectSprintModel::class, 'project_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(TaskTagModel::class, 'task_id');
    }

    public function save(array $options = []): bool
    {
        if (! $this->active || $this->active == 0) {
            $this->active = null;
        }

        return parent::save($options);
    }
}
