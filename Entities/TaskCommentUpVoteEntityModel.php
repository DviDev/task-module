<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCommentUpVoteRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $comment_id
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method TaskCommentUpVoteRepository repository()
 */
class TaskCommentUpVoteEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskCommentUpVoteRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_comment_up_votes', $alias);
    }
}

