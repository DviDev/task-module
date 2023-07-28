<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Task\Entities\TaskCategory\TaskCategoryEntityModel;
use Modules\Task\Models\TaskCategoryModel;

/**
 * @method TaskCategoryModel create(array $attributes = [])
 * @method TaskCategoryModel make(array $attributes = [])
 */
class TaskCategoryFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskCategoryModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskCategoryEntityModel::props(null, true);
        return [
            $p->task_id => null,
            $p->name => $this->faker->word(),
            $p->color => $this->faker->word(),
            $p->start_date => $this->faker->dateTimeBetween(),
            $p->deadline => now()->addDays(random_int(7, 30)),
        ];
    }
}
