<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskCommentFactory;
use Modules\Task\Entities\TaskComment\TaskCommentEntityModel;
use Modules\Task\Entities\TaskComment\TaskCommentProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCommentEntityModel toEntity()
 * @method static TaskCommentFactory factory()
 */
class TaskCommentModel extends BaseModel
{
    use HasFactory;
    use TaskCommentProps;

    public function modelEntity(): string
    {
        return TaskCommentEntityModel::class;
    }

    protected static function newFactory(): TaskCommentFactory
    {
        return new TaskCommentFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_comments', $alias);
    }
}
