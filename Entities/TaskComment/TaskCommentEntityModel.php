<?php

namespace Modules\Task\Entities\TaskComment;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCommentRepository;
use Modules\Task\Models\TaskCommentModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskCommentModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method TaskCommentRepository repository()
 */
class TaskCommentEntityModel extends BaseEntityModel
{
    use TaskCommentProps;

    protected function repositoryClass(): string
    {
        return TaskCommentRepository::class;
    }
}
