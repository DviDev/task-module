<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskCategoryEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCategoryEntityModel toEntity()
 */
class TaskCategoryModel extends BaseModel
{
    function modelEntity()
    {
        return TaskCategoryEntityModel::class;
    }
}
