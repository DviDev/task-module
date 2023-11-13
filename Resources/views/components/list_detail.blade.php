<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="boards" url="{{route('admin.task.boards', $row->id)}}" teal class=" rounded-l-md px-2 pl-3 py-1"/>
        <x-dvui::link text="categories" url="{{route('admin.task.categories', $row->id)}}" teal/>
        <x-dvui::link text="comments" url="{{route('admin.task.comments', $row->id)}}" teal/>
        <x-dvui::link text="histories" url="{{route('admin.task.histories', $row->id)}}" teal/>
        <x-dvui::link text="histories" url="{{route('admin.task.histories', $row->id)}}" teal/>
        <x-dvui::link text="tags" url="{{route('admin.task.tags', $row->id)}}" teal/>
        <x-dvui::link text="works" url="{{route('admin.task.works', $row->id)}}" teal class=" rounded-r-md px-2 pl-3 py-1"/>
    </x-dvui::button.group>
    @if(isset($row->description))
        <div>Descrição: {{$row->description}}</div>
    @endif
</div>
