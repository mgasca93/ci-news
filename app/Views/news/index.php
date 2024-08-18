<h2><?= esc( $title ) ?></h2>
<a href="/news/create">Create new item</a>
<br><br>
<?php if( $news_list !== [] ) : ?>
    <?php foreach( $news_list as $new_item ) : ?>
        <h3><?= esc( $new_item['title'] ) ?></h3>
        <div class="main">
            <p><?= esc( $new_item['body'] ) ?></p>
        </div>
        <p><a href="/news/<?= esc($new_item['slug'], 'url') ?>">View article</a></p>
    <?php endforeach; ?>
<?php else : ?>
    <h3>No news</h3>
    <p>Uneable to find any news for you</p>
<?php endif; ?>