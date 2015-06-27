<li>
    <?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog_latest->alias), $blog_latest->title, 'class' => 'post-name')); ?>
    <?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog_latest->alias), '<img src="/img/blog/' . $blog_latest->id . '.' . $blog_latest->icon . '" width="100%" height="auto" />')); ?>
    <div class="info-box"><?php echo $blog_latest->getDateCreate(); ?></div>
    <?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog_latest->alias), 'More', 'class' => 'fl-right')); ?>
    <div class="clear"></div>
</li>