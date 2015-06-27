<form class="form-horizontal" method="post" action="{{ url('admin/category/add/') }}" autocomplete="off">
    {% if form.has('id') %}
        {{ form.render('id') }}
    {% endif %}
    <fieldset>
        <legend>Create category</legend>
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
                {{ form.render('name') }}
                {{ form.messages('name') }}
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
            <label for="category" class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
                {{ form.render('status') }}
                {{ form.messages('status') }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ submit_button("Save", "class": "btn btn-primary btn-lg") }}
            </div>
        </div>
    </fieldset>
</form>