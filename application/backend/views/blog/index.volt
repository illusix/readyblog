<div class="col-md-12"> 
    <div class="panel panel-visible">
        <div class="panel-body">{{ link_to(['for' : 'blog-add'], 'Create post', 'class' : 'btn btn-lg btn-success fl-right', 'role' : 'button') }}</div>
        <div class="panel-heading">
            <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>Posts
            </div>
        </div>
        <div class="panel-body pn">
            <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Creator</th>
                    <th>Status</th>
                    <th>Date Create</th>
                    <th width="1"></th>
                    <th width="1"></th>
                </tr>
                </thead>
                <tbody>
                {% for blog in blog_list %}
                    <tr>
                        <td>{{ blog.title }}</td>
                        <td>{{ blog.category.name }}</td>
                        <td>{{ blog.writer.name }}</td>
                        <td>{% if blog.status %}Active{% else %}Blocked{% endif %}</td>
                        <td>{{ blog.getDateCreate() }}</td>
                        <td>{{ link_to(['for' : 'blog-edit', 'id' : blog.id], 'Edit') }}</td>
                        <td>{{ link_to(['for' : 'blog-delete', 'id' : blog.id], 'Delete') }}</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>