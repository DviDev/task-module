<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryEntityModel;
use Modules\Task\Models\TaskBoardTaskHistoryModel;

/**
 * @method TaskBoardTaskHistoryModel create(array $attributes = [])
 * @method TaskBoardTaskHistoryModel make(array $attributes = [])
 */
class TaskBoardTaskHistoryFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskBoardTaskHistoryModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskBoardTaskHistoryEntityModel::props(null, true);
        return [

        ];
    }
}
