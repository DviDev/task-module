<?php
namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;
use Modules\Task\Models\TaskCommentUpVoteModel;

/**
 * @method TaskCommentUpVoteModel create(array $attributes = [])
 * @method TaskCommentUpVoteModel make(array $attributes = [])
 */
class TaskCommentUpVoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskCommentUpVoteModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = TaskCommentUpVoteEntityModel::props(null, true);
        return [

        ];
    }
}
