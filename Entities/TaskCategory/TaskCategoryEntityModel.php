<?php

namespace Modules\Task\Entities\TaskCategory;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCategoryRepository;
use Modules\Task\Models\TaskCategoryModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskCategoryModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method TaskCategoryRepository repository()
 */
class TaskCategoryEntityModel extends BaseEntityModel
{
    use TaskCategoryProps;

    protected function repositoryClass(): string
    {
        return TaskCategoryRepository::class;
    }
}
