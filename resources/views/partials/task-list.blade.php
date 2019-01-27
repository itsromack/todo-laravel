<script type="text/mustache-tmpl" id="task-list-template">

    <div class="container">
        <div class="field">
            <div class="control">
                @{{# tasks }}
                <label class="checkbox">
                    <input type="checkbox"> @{{ is_completed }} @{{ item }} @{{ due_date }}
                    <a class="delete">X</a>
                </label>
                @{{/ tasks}}
            </div>
        </div>
    </div>

</script>