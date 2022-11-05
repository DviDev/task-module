<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskBoardRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $project_id
 * @property $name
 * @property $order
 * @method static self props($alias = null, $force = null)
 * @method TaskBoardRepository repository()
 */
class TaskBoardEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskBoardRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_boards', $alias);
    }
}

