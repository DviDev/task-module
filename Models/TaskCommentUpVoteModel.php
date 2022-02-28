<?php

namespace Modules\Task\Models;

use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskCommentUpVoteEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCommentUpVoteEntityModel toEntity()
 */
class TaskCommentUpVoteModel extends BaseModel
{
    function modelEntity()
    {
        return TaskCommentUpVoteEntityModel::class;
    }
}
