<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.task.board.tasks', $row->id)}}"  label="tasks" teal/>
    </div>
    @if(isset($row->description))
        <div>Descrição: {{$row->description}}</div>
    @endif
</div>
