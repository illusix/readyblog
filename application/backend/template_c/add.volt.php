<form class="form-horizontal" method="post" action="<?php echo $this->url->get('admin/post/add/'); ?>" autocomplete="off" enctype="multipart/form-data">
    <?php if ($form->has('id')) { ?>
        <?php echo $form->render('id'); ?>
    <?php } ?>
    <fieldset>
        <legend>Create Post</legend>
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
                <?php echo $form->render('title'); ?>
                <?php echo $form->messages('title'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Alias</label>
            <div class="col-lg-10">
                <?php echo $form->render('alias'); ?>
                <?php echo $form->messages('alias'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Category</label>
            <div class="col-lg-10">
                <?php echo $form->render('category_id'); ?>
                <?php echo $form->messages('category_id'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
                <?php echo $form->render('icon'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
                <?php echo $form->render('status'); ?>
                <?php echo $form->messages('status'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-lg-2 control-label">Content</label>
            <div class="col-lg-10">
                <?php echo $form->render('content'); ?>
                <?php echo $form->messages('content'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </fieldset>
</form>