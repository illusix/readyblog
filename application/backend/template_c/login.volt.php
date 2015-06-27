<form action="<?php echo $form->getAction(); ?>" method="post" class="form-signin">
    <?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>
    <p class="text-warning"><?php echo $form->messages('csrf'); ?></p>

    <h2 class="form-signin-heading">Please sign in</h2>
    <?php echo $form->render('login', array('class' => 'form-control')); ?>
    <p class="text-warning"><?php echo $form->messages('login'); ?></p>

    <?php echo $form->render('password', array('class' => 'form-control')); ?>
    <p class="text-warning"><?php echo $form->messages('password'); ?></p>

    <?php echo $form->render('submit', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
</form>