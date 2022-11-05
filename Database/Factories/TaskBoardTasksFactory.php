<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksEntityModel;
use Modules\Task\Models\TaskBoardTasksModel;

/**
 * @method TaskBoardTasksModel create(array $attributes = [])
 * @method TaskBoardTasksModel make(array $attributes = [])
 */
class TaskBoardTasksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskBoardTasksModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskBoardTasksEntityModel::props(null, true);
        return [

        ];
    }
}
