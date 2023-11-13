<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeEntityModel;
use Modules\Task\Models\TaskHistoryTypeModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskHistoryTypeModel model()
 * @method TaskHistoryTypeEntityModel find($id)
 * @method TaskHistoryTypeModel first()
 * @method TaskHistoryTypeModel findOrNew($id)
 * @method TaskHistoryTypeModel firstOrNew($query)
 * @method TaskHistoryTypeEntityModel findOrFail($id)
 */
class TaskHistoryTypeRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskHistoryTypeModel::class;
    }
}
