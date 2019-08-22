<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= PATH_URL ?>/node_modules/uikit/dist/css/uikit.min.css">
    <title>Document</title>
</head>
<body>
<!-- NAV START -->
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <nav class="uk-background-secondary uk-navbar-transparent uk-navbar-container" uk-navbar="mode: click">
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="accueil">Accueil</a></li>
                <li><a href="<?= PATH_URL ?>/films">Films</a></li>
                <?php if(isset($_SESSION['auth'])):?>
                    <li><a href="<?= PATH_URL ?>/profil" uk-icon="icon: user"></a></li>
                <?php endif; ?>
                <?php if(!isset($_SESSION['auth'])): ?>
                    <li><a href="<?= PATH_URL ?>/login">Se connecter</a></li>
                <?php endif; ?>
                <?php if(!isset($_SESSION['auth'])): ?>
                    <li><a href="<?= PATH_URL ?>/signin">S'inscire</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['auth'])): ?>
                    <li><a href="<?= PATH_URL ?>/logout" uk-icon="icon: sign-out"></a></li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
</div>
<!-- NAV END -->

<section>
        <?= $content ?>
</section>

<script src="<?= PATH_URL ?>/node_modules/uikit/dist/js/uikit.min.js"></script>
<script src="<?= PATH_URL ?>/node_modules/uikit/dist/js/uikit-icons.min.js"></script>
</body>
</html>