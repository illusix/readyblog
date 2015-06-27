<?php foreach ($blog_list as $blog) { ?>
<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog->alias), $blog->title)); ?></span>
    </div>
    <div class="panel-body">
        <div class="info-box">
            <span><?php echo $blog->getDateCreate(); ?></span>
            <span>Created by <?php echo $blog->writer->name; ?></span><?php echo $blog->category->name; ?>
        </div>
        <?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog->alias), '<img src="/img/blog/' . $blog->id . '.' . $blog->icon . '" />')); ?>
        <p><?php echo $blog->getShortContent(); ?></p>
        <?php echo $this->tag->linkTo(array(array('for' => 'blog', 'alias' => $blog->alias), 'More', 'class' => 'btn btn-lg btn-success fl-right', 'role' => 'button')); ?>
    </div>
</div>
<?php } ?>