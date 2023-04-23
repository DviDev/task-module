<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link x-text="tasks" url="{{route('admin.task.board.tasks', $row->id)}}" teal class="rounded px-2 py-1"/>
    </x-dvui::button.group>
    @if(isset($row->description))
        <div>Descrição: {{$row->description}}</div>
    @endif
</div>
