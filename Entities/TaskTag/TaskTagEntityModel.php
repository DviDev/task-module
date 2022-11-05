<?php

namespace Modules\Task\Entities\TaskTag;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskTagRepository;
use Modules\Task\Models\TaskTagModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskTagModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method TaskTagRepository repository()
 */
class TaskTagEntityModel extends BaseEntityModel
{
    use TaskTagProps;

    protected function repositoryClass(): string
    {
        return TaskTagRepository::class;
    }
}
