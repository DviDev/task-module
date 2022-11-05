<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskTagEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskTagEntityModel toEntity()
 */
class TaskTagModel extends BaseModel
{
    function modelEntity()
    {
        return TaskTagEntityModel::class;
    }
}
