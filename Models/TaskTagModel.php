<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskTagFactory;
use Modules\Task\Entities\TaskTag\TaskTagEntityModel;
use Modules\Task\Entities\TaskTag\TaskTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskTagEntityModel toEntity()
 * @method static TaskTagFactory factory()
 */
class TaskTagModel extends BaseModel
{
    use HasFactory;
    use TaskTagProps;

    public function modelEntity(): string
    {
        return TaskTagEntityModel::class;
    }

    protected static function newFactory(): TaskTagFactory
    {
        return new TaskTagFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_tags', $alias);
    }
}
