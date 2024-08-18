<h2><?= esc( $title ) ?></h2>

<?= session()->getFlashdata('error'); ?>
<?= validation_list_errors(); ?>

<?php if( session()->has('message') ) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('message') ?></p>
    </div>
<?php endif; ?>

<form action="<?= url_to('register_authenticate')?>" method="POST">
    <div class="main">
        <?= csrf_field(); ?>

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" placeholder="User Name" value="<?= set_value('name') ?>" required>
        <br>

        <label for="last_name">Last Name :</label>
        <input type="text" id="last_name" name="last_name" placeholder="User Last Name" value="<?= set_value('last_name') ?>" required>
        <br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" placeholder="User E-mail" value="<?= set_value('email') ?>" required>
        <br>
    
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" placeholder="User Password" required>
        <br>

        <label for="password_confirm">Password Confirm:</label>
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Password Confirm" required>
        <br>
    </div>
    <br>
    <button type="submit">Register</button>
</form>