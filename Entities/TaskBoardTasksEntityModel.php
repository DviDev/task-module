<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskBoardTasksRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $board_id
 * @property $task_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method TaskBoardTasksRepository repository()
 */
class TaskBoardTasksEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskBoardTasksRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_board_tasks', $alias);
    }
}

