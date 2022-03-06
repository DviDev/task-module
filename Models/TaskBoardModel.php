<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskBoardEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskBoardEntityModel toEntity()
 */
class TaskBoardModel extends BaseModel
{
    function modelEntity()
    {
        return TaskBoardEntityModel::class;
    }
}
