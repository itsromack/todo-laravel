<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>To Do</title>
</head>
<link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">

<body>

<div class="container">
    <div class="field">
        <h1 class="title">
            Tasks
        </h1>
    </div>
</div>

<div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="form-group has-icons-left has-icons-right">
        <input id="task-item-input" class="form-control form-control-lg" type="text" placeholder="What needs to be done?">
    </div>
</div>

@if (count($tasks) > 0)
<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="form-group">
        <ul class="list-group">
            @foreach ($tasks as $task)
            <li class="list-group-item task-{{ $task->getId() }}">
                <div class="row">
                    <div class="col-1"> 
                    <input type="checkbox" class="task-item-is-complete" data-task-id="{{ $task->getId() }}" {{ ($task->isCompleted())?"checked":null}} data-task-value="{{ $task->is_completed }}"> 
                </div>
                <div class="col-9 task-item-{{ $task->getId() }}">
                    @if ($task->isCompleted())
                    <s>{{ $task->getItem() }}</s>
                    @else
                    {{ $task->getItem() }}
                    @endif
                </div>
                <div class="col">
                    <button type="button" class="delete-task-item" aria-label="Remove" data-task-id="{{ $task->getId() }}">
                        Remove
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/Request.js"></script>
<script type="text/javascript" src="/js/Task.js"></script>
<script type="text/javascript">
(function(){
    t = new Task();
    t.init();
})();
</script>
</body>
</html>