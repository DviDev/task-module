<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Project\Models\ProjectModel;
use Modules\Task\Models\TaskBoardModel;
use Modules\Task\Models\TaskBoardTaskHistoryModel;
use Modules\Task\Models\TaskCommentModel;
use Modules\Task\Models\TaskModel;
use Modules\Workspace\Models\WorkspaceModel;

Route::prefix('task')->group(function () {
    Route::get('/project/{project}/tasks', fn(ProjectModel $project) =>
        view('task::components.page.tasks_page', compact('project')))
        ->name('admin.project.tasks');
    Route::get('/workspace/{workspace}/boards', fn(WorkspaceModel $workspace) =>
        view('task::components.page.boards_page', compact('workspace')))
        ->name('admin.task.boards');
    Route::get('/board/{board}/tasks', fn(TaskBoardModel $board) =>
        view('task::components.page.board_tasks_page', compact('board')))
        ->name('admin.task.board.tasks');
    Route::get('/{task}/histories', fn(TaskModel $task) =>
        view('task::components.page.histories_page', compact('task')))
        ->name('admin.task.histories');
    Route::get('/history/types', fn() =>
        view('task::components.page.history_types_page'))
        ->name('admin.task.history.types');
    Route::get('/{task}/categories', fn(TaskModel $task) =>
        view('task::components.page.categories_page', compact('task')))
        ->name('admin.task.categories');
    Route::get('/{task}/comments', fn(TaskModel $task) =>
        view('task::components.page.comments_page', compact('task')))
        ->name('admin.task.comments');
    Route::get('/comment/{comment}/votes', fn(TaskCommentModel $comment) =>
        view('task::components.page.comment_votes_page', compact('comment')))
        ->name('admin.task.comment.votes');
    Route::get('/{task}/tags', fn(TaskModel $task) =>
        view('task::components.page.tags_page', compact('task')))
        ->name('admin.task.tags');
    Route::get('/{task}/works', fn(TaskModel $task) =>
        view('task::components.page.works_page', compact('task')))
        ->name('admin.task.works');
});
