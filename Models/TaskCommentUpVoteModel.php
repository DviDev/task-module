<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskCommentUpVoteFactory;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCommentUpVoteEntityModel toEntity()
 * @method TaskCommentUpVoteFactory factory()
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
}
