<h2><?= esc( $title ); ?></h2>
<?= session()->getFlashdata('error'); ?>

<?= validation_list_errors(); ?>
<a href="/news">Back news list</a>
<br><br>

<?php if( session()->has('success') ) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('success') ?></p>
    </div>
<?php endif; ?>
<form action="/news" method="POST">
    <?= csrf_field(); ?>

    <label for="title">Title :</label>
    <input type="text" id="title" name="title" placeholder="Title" value="<?= set_Value('title') ?>" required>
    <br>

    <label for="body">Content :</label>
    <textarea name="body" id="body" placeholder="Content" required><?= set_value('body') ?></textarea>
    <br>

    <button type="submit">Create news item</button>
</form>