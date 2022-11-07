<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\TaskComment\TaskCommentEntityModel;
use Modules\Task\Models\TaskCommentModel;

/**
 * @method TaskCommentModel create(array $attributes = [])
 * @method TaskCommentModel make(array $attributes = [])
 */
class TaskCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskCommentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskCommentEntityModel::props(null, true);
        return [
            $p->task_id => null,
            $p->user_id => null,
            $p->parent_id => collect([null, TaskCommentModel::query()->inRandomOrder()->first()->id])->random(),
            $p->message => $this->faker->sentence(),
        ];
    }
}
