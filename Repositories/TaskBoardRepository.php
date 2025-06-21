<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Models\TaskBoardModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method TaskBoardModel model()
 * @method TaskBoardEntityModel find($id)
 * @method TaskBoardModel first()
 * @method TaskBoardModel findOrNew($id)
 * @method TaskBoardModel firstOrNew($query)
 * @method TaskBoardEntityModel findOrFail($id)
 */
class TaskBoardRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return TaskBoardModel::class;
    }
}
