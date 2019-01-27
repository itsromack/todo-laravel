<!DOCTYPE html>
<html>
<head>
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

<div class="container">
    <div class="field">
        <div class="control has-icons-left has-icons-right">
            <input id="task-item-input" class="input" type="email" placeholder="What needs to be done?">
        </div>
    </div>
</div>

<div class="container" id="task-list">
    @foreach ($tasks as $task)
        <input type="checkbox" class="task-item-is-complete" data-task-id="{{ $task->getId() }}">
        {{ $task->getItem() }}
        <button class="delete-task-item" data-task-id="{{ $task->getId() }}">Remove</button>
        <br>
    @endforeach
</div>

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