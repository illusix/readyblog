<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9 blog-list">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">{{ blog.title }}</span>
                </div>
                <div class="panel-body">
                    <div class="info-box">
                        <span>{{ blog.getDateCreate() }}</span>
                        <span>Created by {{ blog.writer.name }}</span>{{ blog.category.name }}
                    </div>
                    <img src="/img/blog/{{ blog.id }}.{{ blog.icon }}" />
                    <p>{{ blog.content }}</p>
                </div>
            </div>
        </div>
        {{ partial('asideright') }}
    </div>
</div>