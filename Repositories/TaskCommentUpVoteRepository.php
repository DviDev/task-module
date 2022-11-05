<?php

namespace Modules\Task\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;
use Modules\Task\Models\TaskCommentUpVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method TaskCommentUpVoteModel model()
 * @method TaskCommentUpVoteEntityModel find($id)
 * @method TaskCommentUpVoteModel first()
 * @method TaskCommentUpVoteModel findOrNew($id)
 * @method TaskCommentUpVoteModel firstOrNew($query)
 * @method TaskCommentUpVoteEntityModel findOrFail($id)
 */
class TaskCommentUpVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return TaskCommentUpVoteModel::class;
    }
}
