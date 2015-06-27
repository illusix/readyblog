<li>
    {{ link_to(['for' : 'blog', 'alias' : blog_latest.alias], blog_latest.title, 'class' : 'post-name') }}
    {{ link_to(['for' : 'blog', 'alias' : blog_latest.alias], '<img src="/img/blog/'~blog_latest.id~'.'~blog_latest.icon~'" width="100%" height="auto" />') }}
    <div class="info-box">{{ blog_latest.getDateCreate() }}</div>
    {{ link_to(['for' : 'blog', 'alias' : blog_latest.alias], 'More', 'class' : 'fl-right') }}
    <div class="clear"></div>
</li>