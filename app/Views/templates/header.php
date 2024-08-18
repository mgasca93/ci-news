<!doctype html>
<html>
<head>
    <title><?= ( strlen( $title ) > 0 ) ? $title :'CodeIgniter' ?></title>
</head>
<body>
    <nav>
        <ul>            
            <li>
                <a href="<?= url_to('news_list') ?>">News</a>
            </li>
            <?php if( !session()->get('logged_in') ) : ?>
            <li>
                <a href="<?= url_to('login_form') ?>">Login</a>
            </li> 
            <li>
                <a href="<?= url_to('register_form') ?>">Register</a>
            </li> 
            <?php endif; ?>
            <?php if( session()->get('logged_in') ) : ?>                       
            <li>                
                <span>Welcome <?= session()->get('name') ?></span> <a href="<?= url_to('logout') ?>">Logout</a>
            </li> 
            <?php endif; ?>           
        </ul>
    </nav>