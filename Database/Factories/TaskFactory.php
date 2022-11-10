<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\Task\TaskPriorityEnum;
use Modules\Task\Entities\Task\TaskStatusEnum;
use Modules\Task\Models\TaskCategoryModel;
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
            $p->name => $this->faker->words(3, true),
            $p->description => $this->faker->sentence(),
            $p->owner_id => null,
            $p->workspace_id => null,
            $p->project_id => null,
            $p->category_id => TaskCategoryModel::query()->inRandomOrder()->first()->id ?? null,
            $p->solution => $this->faker->sentence(),
            $p->parent_id => TaskModel::query()->inRandomOrder()->first()->id ?? null,
            $p->recipient_user_id => null,
            $p->time_estimate => $this->faker->randomDigit(),
            $p->start_date => $this->faker->dateTimeBetween(),
            $p->deadline => now()->addDays(random_int(1, 9)),
            $p->priority => collect(TaskPriorityEnum::toArray())->random(),
            $p->status => collect(TaskStatusEnum::toArray())->random(),
            $p->num_order => random_int(1, 5),
            $p->percent_completed => random_int(1, 100),
            $p->repeat_end => null,
            $p->repeat_type => null,
            $p->repeat_num => null,
            $p->active => $this->faker->boolean(),
        ];
    }
}
