<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskBoardTaskHistoryRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $board_task_to_item_id
 * @property $updated_at
 * @property $updated_by_user_id
 * @method static self props($alias = null, $force = null)
 * @method TaskBoardTaskHistoryRepository repository()
 */
class TaskBoardTaskHistoryEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskBoardTaskHistoryRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_board_task_histories', $alias);
    }
}

