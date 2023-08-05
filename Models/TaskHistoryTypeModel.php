<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeEntityModel;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method TaskHistoryTypeEntityModel toEntity()
 */
class TaskHistoryTypeModel extends BaseModel
{
    use HasFactory;
    use TaskHistoryTypeProps;

    public function modelEntity(): string
    {
        return TaskHistoryTypeEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = TaskHistoryTypeModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('task_history_types', $alias);
    }

    public function getGuarded(): array
    {
        $p = TaskHistoryTypeEntityModel::props();
        return collect($p->toArray())->except([
            $p->id
        ])->toArray();
    }
}
