<div class="col-md-3 col-lg-3 blog-categories">
    <?php if ($this->length($categories)) { ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Categories</span>
        </div>
        <div class="panel-body">
            <ul>
                <?php foreach ($categories as $category) { ?>
                    <li><?php echo $this->tag->linkTo(array(array('for' => 'category', 'alias' => $category->alias), $category->name)); ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
    <?php if (isset($latest) && $this->length($latest)) { ?>
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Latest Posts</span>
            </div>
            <div class="panel-body related">
                <ul>
                    <?php foreach ($latest as $blog_latest) { ?>
                        <?php echo $this->partial('bloglatest'); ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>