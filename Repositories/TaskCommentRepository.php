<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskCommentEntityModel;
use Modules\Task\Models\TaskCommentModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskCommentModel model()
 * @method TaskCommentEntityModel find($id)
 * @method TaskCommentModel first()
 * @method TaskCommentModel findOrNew($id)
 * @method TaskCommentModel firstOrNew($query)
 * @method TaskCommentEntityModel findOrFail($id)
 */
class TaskCommentRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskCommentModel::class;
    }
}
