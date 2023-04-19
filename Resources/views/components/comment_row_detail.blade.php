<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.task.comment.votes', $row->id)}}" label="interactions" teal/>
    </div>
    @if(isset($row->message))
        <div>Descrição: {{$row->message}}</div>
    @endif
</div>
