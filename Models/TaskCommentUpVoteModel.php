<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskCommentUpVoteFactory;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskCommentModel $comment
 * @property-read User $user
 * @method TaskCommentUpVoteEntityModel toEntity()
 * @method static TaskCommentUpVoteFactory factory()
 */
class TaskCommentUpVoteModel extends BaseModel
{
    use HasFactory;
    use TaskCommentUpVoteProps;

    public function modelEntity(): string
    {
        return TaskCommentUpVoteEntityModel::class;
    }

    protected static function newFactory(): TaskCommentUpVoteFactory
    {
        return new TaskCommentUpVoteFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_comment_votes', $alias);
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(TaskCommentModel::class, 'comment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
