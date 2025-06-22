<?php

namespace Modules\Task\Entities\TaskHistoryType;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Models\TaskHistoryTypeModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskHistoryTypeModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class TaskHistoryTypeEntityModel extends BaseEntityModel
{
    use TaskHistoryTypeProps;
}
