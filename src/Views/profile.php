<h1>Bienvenue sur la page profil</h1>
<div uk-grid class="uk-grid-large">
    <div class="uk-container uk-width-2-3@m">
        <div class="uk-margin-left uk-margin-right">
            <div class="uk-padding">
                <h2>Whishlist</h2>
                <?php foreach($user->whishlist as $film):?>
                    <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-card-hover uk-margin">
                        <h3 class="uk-card-title"><?= ucfirst($film['titre']) ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="uk-container uk-width-1-3@m">
        <h2>Profil info</h2>
    </div>
</div>