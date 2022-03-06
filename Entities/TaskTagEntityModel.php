<?php

namespace Modules\Task\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskTagRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $task_id
 * @property $tag
 * @method static self props($alias = null, $force = null)
 * @method TaskTagRepository repository()
 */
class TaskTagEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return TaskTagRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('task_tags', $alias);
    }
}

