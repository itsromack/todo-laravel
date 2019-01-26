<!DOCTYPE html>
<html>
<head>
    <title>To Do</title>
</head>
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

<div class="container">
    <div class="field">
        <div class="control">
            <label class="checkbox">
                <input type="checkbox"> Task Item Content
                <a class="delete"></a>
            </label>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/Request.js"></script>
<script type="text/javascript" src="/js/Task.js"></script>
<script type="text/javascript">
(function(){
    t = new Task();
})();
</script>
</body>
</html>