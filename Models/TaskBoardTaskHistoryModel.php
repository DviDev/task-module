<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoardTaskHistoryEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskBoardTaskHistoryEntityModel toEntity()
 */
class TaskBoardTaskHistoryModel extends BaseModel
{
    function modelEntity()
    {
        return TaskBoardTaskHistoryEntityModel::class;
    }
}
