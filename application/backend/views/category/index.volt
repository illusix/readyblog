<div class="col-md-12"> 
    <div class="panel panel-visible">
        <div class="panel-body">{{ link_to(['for' : 'category-add'], 'Create category', 'class' : 'btn btn-lg btn-success fl-right', 'role' : 'button') }}</div>
        <div class="panel-heading">
            <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>Categories
            </div>
        </div>
        <div class="panel-body pn">
            <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date Create</th>
                    <th width="1"></th>
                    <th width="1"></th>
                </tr>
                </thead>
                <tbody>
                {% for category in category_list %}
                    <tr>
                        <td>{{ category.name }}</td>
                        <td>{% if category.status %}Active{% else %}Blocked{% endif %}</td>
                        <td>{{ category.getDateCreate() }}</td>
                        <td>{{ link_to(['for' : 'category-edit', 'id' : category.id], 'Edit') }}</td>
                        <td>{{ link_to(['for' : 'category-delete', 'id' : category.id], 'Delete') }}</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>