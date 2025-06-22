<?php

namespace Modules\Task\Entities\TaskBoardTasks;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Models\TaskBoardTasksModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskBoardTasksModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class TaskBoardTasksEntityModel extends BaseEntityModel
{
    use TaskBoardTasksProps;
}
