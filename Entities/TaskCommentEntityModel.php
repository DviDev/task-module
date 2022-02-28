<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCommentRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $task_id
 * @property $user_id
 * @property $parent_id
 * @property $message
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method TaskCommentRepository repository()
 */
class TaskCommentEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskCommentRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_comments', $alias);
    }
}

