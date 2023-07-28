<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Task\Entities\TaskWork\TaskWorkEntityModel;
use Modules\Task\Models\TaskWorkModel;

/**
 * @method TaskWorkModel create(array $attributes = [])
 * @method TaskWorkModel make(array $attributes = [])
 */
class TaskWorkFactory extends BaseFactory
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
            $p->task_id => null,
            $p->user_id => null,
            $p->task_start => $this->faker->dateTimeBetween('-30 years', now()),
            $p->task_end => now()->addDays(random_int(3, 20)),
            $p->description => $this->faker->sentence(),
        ];
    }
}
