var Task = function() {
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
        r = new Request();
        r.post(url, {
            item: that.item.value
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