<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\TaskWork\TaskWorkEntityModel;
use Modules\Task\Models\TaskWorkModel;

/**
 * @method TaskWorkModel create(array $attributes = [])
 * @method TaskWorkModel make(array $attributes = [])
 */
class TaskWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskWorkModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskWorkEntityModel::props(null, true);
        return [

        ];
    }
}
