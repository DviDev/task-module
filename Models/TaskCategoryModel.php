<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskCategoryFactory;
use Modules\Task\Entities\TaskCategory\TaskCategoryEntityModel;
use Modules\Task\Entities\TaskCategory\TaskCategoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskCategoryEntityModel toEntity()
 * @method static TaskCategoryFactory factory()
 */
class TaskCategoryModel extends BaseModel
{
    use HasFactory;
    use TaskCategoryProps;

    public function modelEntity(): string
    {
        return TaskCategoryEntityModel::class;
    }

    protected static function newFactory(): TaskCategoryFactory
    {
        return new TaskCategoryFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_categories', $alias);
    }
}
