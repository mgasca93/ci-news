<h2><?= esc( $title ) ?></h2>

<?= session()->getFlashdata('error'); ?>
<?= validation_list_errors(); ?>

<?php if( session()->has('message') ) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('message') ?></p>
    </div>
<?php endif; ?>

<form action="<?= url_to('authenticate') ?>" method="POST">
    <div class="main">
        <?= csrf_field(); ?>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" placeholder="User E-mail" value="<?= set_value('email') ?>" required>
        <br>
    
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" placeholder="User Password" required>
    </div>
    <br>
    <button type="submit">Login</button>
</form>