<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCategoryRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $project_id
 * @property $name
 * @property $color
 * @property $start_date
 * @property $deadline
 * @property $created_at
 * @property $created_by_user_id
 * @method static self props($alias = null, $force = null)
 * @method TaskCategoryRepository repository()
 */
class TaskCategoryEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskCategoryRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_categories', $alias);
    }
}

