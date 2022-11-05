<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $name
 * @property $description
 * @property $project_id
 * @property $category_id
 * @property $solution
 * @property $parent_id
 * @property $to_user_id
 * @property $time_estimate
 * @property $start_date
 * @property $deadline
 * @property $priority
 * @property $status
 * @property $num_order
 * @property $percent_completed
 * @property $repeat_end
 * @property $repeat_type
 * @property $repeat_num
 * @property $active
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method TaskRepository repository()
 */
class TaskEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('tasks', $alias);
    }
}

