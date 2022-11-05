<?php

namespace Modules\Task\Entities\TaskBoardTaskHistory;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskBoardTaskHistoryRepository;
use Modules\Task\Models\TaskBoardTaskHistoryModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskBoardTaskHistoryModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method TaskBoardTaskHistoryRepository repository()
 */
class TaskBoardTaskHistoryEntityModel extends BaseEntityModel
{
    use TaskBoardTaskHistoryProps;

    protected function repositoryClass(): string
    {
        return TaskBoardTaskHistoryRepository::class;
    }
}
