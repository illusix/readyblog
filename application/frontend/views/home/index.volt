<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9 blog-list">
            {{ partial('../blog/single', ['blog_list' : blog_list]) }}
            {% set urlData  = {'for' : 'home'} %}
            {{ partial('pagination', ['data' : collection, 'url' : urlData]) }}
        </div>
        {{ partial('asideright') }}
    </div>
</div>