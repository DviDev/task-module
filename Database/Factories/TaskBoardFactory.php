<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Models\TaskBoardModel;

/**
 * @method TaskBoardModel create(array $attributes = [])
 * @method TaskBoardModel make(array $attributes = [])
 */
class TaskBoardFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskBoardModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskBoardEntityModel::props(null, true);
        return [
            $p->workspace_id => null,
            $p->name => $this->faker->words(3, true),
            $p->order => random_int(1, 5),
        ];
    }
}
