<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Task\Http\Livewire\Pages\TasksPage;
use Modules\Task\Http\Livewire\TaskBoardTable;
use Modules\Task\Http\Livewire\TaskBoardTaskTable;
use Modules\Task\Http\Livewire\TaskCategoryTable;
use Modules\Task\Http\Livewire\TaskCommentTable;
use Modules\Task\Http\Livewire\TaskCommentVoteTable;
use Modules\Task\Http\Livewire\TaskHistoryTable;
use Modules\Task\Http\Livewire\TaskHistoryTypeTable;
use Modules\Task\Http\Livewire\TaskTable;
use Modules\Task\Http\Livewire\TaskTagTable;
use Modules\Task\Http\Livewire\TaskWorkTable;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Task';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'task';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \Livewire::component('task::pages', TasksPage::class);
        \Livewire::component('task::board-table', TaskBoardTable::class);
        \Livewire::component('task::board-task-table', TaskBoardTaskTable::class);
        \Livewire::component('task::category-table', TaskCategoryTable::class);
        \Livewire::component('task::comment-table', TaskCommentTable::class);
        \Livewire::component('task::comment-vote-table', TaskCommentVoteTable::class);
        \Livewire::component('task::history-table', TaskHistoryTable::class);
        \Livewire::component('task::history-type-table', TaskHistoryTypeTable::class);
        \Livewire::component('task::table', TaskTable::class);
        \Livewire::component('task::tag--table', TaskTagTable::class);
        \Livewire::component('task::work-table', TaskWorkTable::class);

        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
