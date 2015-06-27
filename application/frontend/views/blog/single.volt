{% for blog in blog_list %}
<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{ link_to(['for' : 'blog', 'alias' : blog.alias], blog.title) }}</span>
    </div>
    <div class="panel-body">
        <div class="info-box">
            <span>{{ blog.getDateCreate() }}</span>
            <span>Created by {{ blog.writer.name }}</span>{{ blog.category.name }}
        </div>
        {{ link_to(['for' : 'blog', 'alias' : blog.alias], '<img src="/img/blog/'~blog.id~'.'~blog.icon~'" />') }}
        <p>{{ blog.getShortContent() }}</p>
        {{ link_to(['for' : 'blog', 'alias' : blog.alias], 'More', 'class' : 'btn btn-lg btn-success fl-right', 'role' : 'button') }}
    </div>
</div>
{% endfor %}