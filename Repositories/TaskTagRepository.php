<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskTag\TaskTagEntityModel;
use Modules\Task\Models\TaskTagModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskTagModel model()
 * @method TaskTagEntityModel find($id)
 * @method TaskTagModel first()
 * @method TaskTagModel findOrNew($id)
 * @method TaskTagModel firstOrNew($query)
 * @method TaskTagEntityModel findOrFail($id)
 */
class TaskTagRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskTagModel::class;
    }
}
