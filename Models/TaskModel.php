<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskEntityModel toEntity()
 */
class TaskModel extends BaseModel
{
    function modelEntity()
    {
        return TaskEntityModel::class;
    }
}
