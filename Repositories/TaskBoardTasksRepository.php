<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksEntityModel;
use Modules\Task\Models\TaskBoardTasksModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskBoardTasksModel model()
 * @method TaskBoardTasksEntityModel find($id)
 * @method TaskBoardTasksModel first()
 * @method TaskBoardTasksModel findOrNew($id)
 * @method TaskBoardTasksModel firstOrNew($query)
 * @method TaskBoardTasksEntityModel findOrFail($id)
 */
class TaskBoardTasksRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskBoardTasksModel::class;
    }
}
