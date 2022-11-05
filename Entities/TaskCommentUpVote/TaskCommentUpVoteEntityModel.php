<?php

namespace Modules\Task\Entities\TaskCommentUpVote;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Task\Repositories\TaskCommentUpVoteRepository;
use Modules\Task\Models\TaskCommentUpVoteModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read TaskCommentUpVoteModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method TaskCommentUpVoteRepository repository()
 */
class TaskCommentUpVoteEntityModel extends BaseEntityModel
{
    use TaskCommentUpVoteProps;

    protected function repositoryClass(): string
    {
        return TaskCommentUpVoteRepository::class;
    }
}
