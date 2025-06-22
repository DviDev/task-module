<?php

namespace Modules\Task\Entities\TaskWork;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Models\TaskWorkModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskWorkModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class TaskWorkEntityModel extends BaseEntityModel
{
    use TaskWorkProps;
}
