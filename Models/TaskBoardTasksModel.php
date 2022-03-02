<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoardTasksEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskBoardTasksEntityModel toEntity()
 */
class TaskBoardTasksModel extends BaseModel
{
    function modelEntity()
    {
        return TaskBoardTasksEntityModel::class;
    }
}
