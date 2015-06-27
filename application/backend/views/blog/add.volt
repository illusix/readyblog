<form class="form-horizontal" method="post" action="{{ url('admin/post/add/') }}" autocomplete="off" enctype="multipart/form-data">
    {% if form.has('id') %}
        {{ form.render('id') }}
    {% endif %}
    <fieldset>
        <legend>Create Post</legend>
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
                {{ form.render('title') }}
                {{ form.messages('title') }}
            </div>
        </div>
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Alias</label>
            <div class="col-lg-10">
                {{ form.render('alias') }}
                {{ form.messages('alias') }}
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Category</label>
            <div class="col-lg-10">
                {{ form.render('category_id') }}
                {{ form.messages('category_id') }}
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
                {{ form.render('icon') }}
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
                {{ form.render('status') }}
                {{ form.messages('status') }}
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-lg-2 control-label">Content</label>
            <div class="col-lg-10">
                {{ form.render('content') }}
                {{ form.messages('content') }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ submit_button("Save", "class": "btn btn-primary btn-lg") }}
            </div>
        </div>
    </fieldset>
</form>