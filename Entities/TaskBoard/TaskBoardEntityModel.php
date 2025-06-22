<?php

namespace Modules\Task\Entities\TaskBoard;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Models\TaskBoardModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read TaskBoardModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class TaskBoardEntityModel extends BaseEntityModel
{
    use TaskBoardProps;
}
