<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskCommentEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCommentEntityModel toEntity()
 */
class TaskCommentModel extends BaseModel
{
    function modelEntity()
    {
        return TaskCommentEntityModel::class;
    }
}
