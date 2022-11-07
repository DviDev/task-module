<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\TaskTag\TaskTagEntityModel;
use Modules\Task\Models\TaskTagModel;

/**
 * @method TaskTagModel create(array $attributes = [])
 * @method TaskTagModel make(array $attributes = [])
 */
class TaskTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskTagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskTagEntityModel::props(null, true);
        return [
            $p->task_id => null,
            $p->tag => null,
        ];
    }
}
