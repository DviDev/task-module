<?php

namespace Modules\Task\Entities\Task;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Models\TaskModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class TaskEntityModel extends BaseEntityModel
{
    use TaskProps;
}
