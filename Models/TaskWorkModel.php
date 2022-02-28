<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskWorkEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskWorkEntityModel toEntity()
 */
class TaskWorkModel extends BaseModel
{
    function modelEntity()
    {
        return TaskWorkEntityModel::class;
    }
}
