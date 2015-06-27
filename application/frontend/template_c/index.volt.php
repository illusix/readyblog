<!DOCTYPE html>
<html>
<head>
    <?php echo $this->tag->getTitle(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description; ?>">
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <?php echo $this->tag->javascriptInclude('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', false); ?>
    <?php echo $this->assets->outputCss('header'); ?>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="default-box">
            <?php echo $this->tag->linkTo(array(array('for' => 'home'), '', 'class' => 'logo')); ?>
            <ul class="fl-right menu">
                <?php $menu_list = array('About', 'Contact'); ?>
                <li><?php echo $this->tag->linkTo(array(array('for' => 'home'), 'Home')); ?></li>
                <?php foreach ($menu_list as $link) { ?>
                    <li><?php echo $this->tag->linkTo(array(array('for' => 'static', 'alias' => Phalcon\Text::lower($link)), $link)); ?></li>
                <?php } ?>
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
<?php echo $this->assets->outputJs('footer'); ?>

</body>
</html>