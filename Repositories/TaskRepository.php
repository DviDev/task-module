<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Models\TaskModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method TaskModel model()
 * @method TaskEntityModel find($id)
 * @method TaskModel first()
 * @method TaskModel findOrNew($id)
 * @method TaskModel firstOrNew($query)
 * @method TaskEntityModel findOrFail($id)
 */
class TaskRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return TaskModel::class;
    }
}
