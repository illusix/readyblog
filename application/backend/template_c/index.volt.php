<!DOCTYPE html>
<html>
<head>
    <?php echo $this->tag->getTitle(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <?php echo $this->tag->javascriptInclude('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', false); ?>
    <?php echo $this->assets->outputCss('header'); ?>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="default-box">
            <?php echo $this->tag->linkTo(array(array('for' => 'admin-blog'), '', 'class' => 'logo')); ?>
            <ul class="fl-right menu">
                <li><?php echo $this->tag->linkTo(array(array('for' => 'home'), 'Go to front-end‏')); ?></li>
                <li><?php echo $this->tag->linkTo(array(array('for' => 'admin-blog'), 'Posts')); ?></li>
                <li><?php echo $this->tag->linkTo(array(array('for' => 'admin-category'), 'Categories')); ?></li>
                <li><?php echo $this->tag->linkTo(array(array('for' => 'logout'), 'Logout')); ?></li>
            </ul>
        </div>
    </header>
    <?php echo $this->getContent(); ?>
    <div class="clear"></div>
</div>
<footer class="footer">
    <div class="default-box">
        <div class="copyright">Copyright © 2015 Ready.Blog for Yaroslav. All right reserved.</div>
    </div>
</footer>

<?php if ($this->assets->collection('ckeditor')->count()) { ?>
   <?php echo $this->assets->outputJs('ckeditor'); ?>
<?php } ?>

<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>