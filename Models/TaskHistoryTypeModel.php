<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Database\Factories\TaskHistoryTypeFactory;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeEntityModel;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskHistoryTypeEntityModel toEntity()
 * @method static TaskHistoryTypeFactory factory()
 */
class TaskHistoryTypeModel extends BaseModel
{
    use HasFactory;
    use TaskHistoryTypeProps;

    public function modelEntity(): string
    {
        return TaskHistoryTypeEntityModel::class;
    }

    protected static function newFactory(): TaskHistoryTypeFactory
    {
        return new TaskHistoryTypeFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_history_types', $alias);
    }

    public function getGuarded()
    {
        $p = TaskHistoryTypeEntityModel::props();
        return collect($p->toArray())->except([
            $p->id
        ])->toArray();
    }
}
