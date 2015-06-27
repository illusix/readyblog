<div class="col-md-3 col-lg-3 blog-categories">
    {% if categories|length %}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Categories</span>
        </div>
        <div class="panel-body">
            <ul>
                {% for category in categories %}
                    <li>{{ link_to(['for' : 'category', 'alias' : category.alias], category.name) }}</li>
                {% endfor %}
            </ul>
        </div>
    </div>
    {% endif %}
    {% if latest is defined and latest|length %}
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Latest Posts</span>
            </div>
            <div class="panel-body related">
                <ul>
                    {% for blog_latest in latest %}
                        {{ partial('bloglatest') }}
                    {% endfor %}
                </ul>
            </div>
        </div>
    {% endif %}
</div>