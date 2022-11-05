<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Models\TaskModel;

/**
 * @method TaskModel create(array $attributes = [])
 * @method TaskModel make(array $attributes = [])
 */
class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskEntityModel::props(null, true);
        return [

        ];
    }
}
