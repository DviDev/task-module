<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Project\Entities\ProjectSprint\ProjectSprintEntityModel;
use Modules\Project\Models\ProjectSprintModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ProjectSprintModel model()
 * @method ProjectSprintEntityModel find($id)
 * @method ProjectSprintModel first()
 * @method ProjectSprintModel findOrNew($id)
 * @method ProjectSprintModel firstOrNew($query)
 * @method ProjectSprintEntityModel findOrFail($id)
 */
class TaskCategoryRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ProjectSprintModel::class;
    }
}
