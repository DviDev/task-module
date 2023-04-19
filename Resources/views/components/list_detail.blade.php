<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.task.boards', $row->id)}}" label="boards" teal/>
        <x-button href="{{route('admin.task.categories', $row->id)}}" label="categories" teal/>
        <x-button href="{{route('admin.task.comments', $row->id)}}" label="comments" teal/>
        <x-button href="{{route('admin.task.histories', $row->id)}}" label="histories" teal/>
        <x-button href="{{route('admin.task.histories', $row->id)}}" label="histories" teal/>
        <x-button href="{{route('admin.task.tags', $row->id)}}" label="tags" teal/>
        <x-button href="{{route('admin.task.works', $row->id)}}" label="works" teal/>
    </div>
    @if(isset($row->description))
        <div>Descrição: {{$row->description}}</div>
    @endif
</div>
