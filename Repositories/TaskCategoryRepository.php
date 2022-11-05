<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskCategory\TaskCategoryEntityModel;
use Modules\Task\Models\TaskCategoryModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskCategoryModel model()
 * @method TaskCategoryEntityModel find($id)
 * @method TaskCategoryModel first()
 * @method TaskCategoryModel findOrNew($id)
 * @method TaskCategoryModel firstOrNew($query)
 * @method TaskCategoryEntityModel findOrFail($id)
 */
class TaskCategoryRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskCategoryModel::class;
    }
}
