<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/uikit/dist/css/uikit.min.css">
    <title>Document</title>
</head>
<body>
<!-- NAV START -->
<nav class=" uk-light uk-background-secondary uk-navbar-transparent uk-navbar-container uk-margin" uk-navbar="mode: click">
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="">Accueil</a></li>
            <li><a href="films">Films</a></li>
            <?php if(isset($_SESSION['auth'])):?>
                <li><a href="" uk-icon="icon: user"></a></li>
            <?php endif; ?>
            <?php if(!isset($_SESSION['auth'])): ?>
                <li><a href="#">Sign in</a></li>
            <?php endif; ?>
            <?php if(!isset($_SESSION['auth'])): ?>
                <li><a href="#">Sign out</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['auth'])): ?>
                <li><a href="logout" uk-icon="icon: sign-out"></a></li>
            <?php endif; ?>
        </ul>

    </div>
</nav>
<!-- NAV END -->
<section>
        <?= $content ?>
</section>
<footer></footer>
<script src="node_modules/uikit/dist/js/uikit.min.js"></script>
<script src="node_modules/uikit/dist/js/uikit-icons.min.js"></script>
</body>
</html>