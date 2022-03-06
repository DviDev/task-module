<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskBoardTaskHistoryEntityModel;
use Modules\Task\Models\TaskBoardTaskHistoryModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskBoardTaskHistoryModel model()
 * @method TaskBoardTaskHistoryEntityModel find($id)
 * @method TaskBoardTaskHistoryModel first()
 * @method TaskBoardTaskHistoryModel findOrNew($id)
 * @method TaskBoardTaskHistoryModel firstOrNew($query)
 * @method TaskBoardTaskHistoryEntityModel findOrFail($id)
 */
class TaskBoardTaskHistoryRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskBoardTaskHistoryModel::class;
    }
}
