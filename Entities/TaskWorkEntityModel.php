<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskWorkRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $task_id
 * @property $user_id
 * @property $task_start
 * @property $task_end
 * @property $description
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method TaskWorkRepository repository()
 */
class TaskWorkEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskWorkRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_works', $alias);
    }
}

