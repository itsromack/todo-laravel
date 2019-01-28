var Task = function() {
    this.request = new Request();
    that = this;
    this.init = function() {
        that.item = document.getElementById('task-item-input');
        that.item.onkeypress = function(e) {
            if (e.keyCode == 13) {
                that.save(that.item.value);
            }
        }

        // Bind event for completing task item
        $('.task-item-is-complete').on('change', function() {
            var task_id = $(this).data('task-id');
            var task_value = parseInt($(this).data('task-value'));
            if (task_value == 1) {
                that.setIncomplete(task_id);
            } else {
                that.setComplete(task_id);
            }
        });

        // Bind event for removing task item
        $('.delete-task-item').on('click', function() {
            var task_id = $(this).data('task-id');
            console.log('Delete ' + $(this).data('task-id'));
            that.remove(task_id);
        });
    }
    this.save = function(value) {
        url = TaskAPI.urls.save;
        that.request.post(url, {
            item: that.item.value
        }, function(response) {
            var template = document.getElementById('task-list-template');
            window.location.reload();
        }, function(error) {
            console.log(error);
        });
    }
    // this.update = function() {
    //     //
    // }
    this.setComplete = function(task_id) {
        var data = {
            task_id: task_id
        };
        that.request.post(TaskAPI.urls.set_complete, data, function(response) {
            $('.task-' + response.task_id + ' .task-item-is-complete').data('task-value', 1);
            $('.task-item-' + response.task_id).html(response.text);
        });
    }
    this.setIncomplete = function(task_id) {
        var data = {
            task_id: task_id
        };
        that.request.post(TaskAPI.urls.set_incomplete, data, function(response) {
            $('.task-' + response.task_id + ' .task-item-is-complete').data('task-value', 0);
            $('.task-item-' + response.task_id).html(response.text);
        });
    }
    // this.setDueDate = function() {
    //     //
    // }
    this.remove = function(task_id) {
        var data = {
            task_id: task_id
        };
        that.request.post(TaskAPI.urls.set_delete, data, function(response) {
            $('.task-' + response.task_id).fadeOut();
        });
    }
    // this.updateTaskList = function() {
    //     that.request.get(TaskAPI.urls.tasks, function(response) {
    //         if (response.success) {
    //             console.log(response);
    //         }
    //     });
    // }
}

var TaskAPI = {
    urls: {
        tasks: '/api/tasks',
        task: function(id) {
            return '/api/tasks/' + id;
        },
        save: '/api/tasks/',
        update: '/api/tasks/update',
        set_complete: '/api/tasks/complete',
        set_incomplete: '/api/tasks/complete/negate',
        set_delete: '/api/tasks/delete',
        // set_undelete: '/api/tasks/delete/negate',
    }
}