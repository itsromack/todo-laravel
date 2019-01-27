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
    }
    this.save = function(value) {
        url = TaskAPI.urls.save;
        that.request.post(url, {
            item: that.item.value
        }, function(response) {
            var template = document.getElementById('task-list-template');
            console.log(template);
            that.updateTaskList();
        }, function(error) {
            console.log(error);
        });
    }
    this.update = function() {
        //
    }
    this.setComplete = function() {
        //
    }
    this.setIncomplete = function() {
        //
    }
    this.setDueDate = function() {
        //
    }
    this.remove = function() {
        //
    }
    this.unremove = function() {
        //
    }
    this.updateTaskList = function() {
        that.request.get(TaskAPI.urls.tasks, function(response) {
            if (response.success) {
                console.log(response);
            }
        });
    }
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
        set_undelete: '/api/tasks/delete/negate',
    }
}