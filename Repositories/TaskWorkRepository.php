<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskWork\TaskWorkEntityModel;
use Modules\Task\Models\TaskWorkModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method TaskWorkModel model()
 * @method TaskWorkEntityModel find($id)
 * @method TaskWorkModel first()
 * @method TaskWorkModel findOrNew($id)
 * @method TaskWorkModel firstOrNew($query)
 * @method TaskWorkEntityModel findOrFail($id)
 */
class TaskWorkRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return TaskWorkModel::class;
    }
}
