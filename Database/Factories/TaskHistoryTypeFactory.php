<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Task\Models\TaskHistoryTypeModel;
use Modules\Task\Entities\TaskHistoryType\TaskHistoryTypeEntityModel;

/**
 * @method TaskHistoryTypeModel create(array $attributes = [])
 * @method TaskHistoryTypeModel make(array $attributes = [])
 */
class TaskHistoryTypeFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskHistoryTypeModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskHistoryTypeEntityModel::props(null, true);
        return $this->getValues();
    }
}
