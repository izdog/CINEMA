<div uk-grid>
    <!-- FILM FIELD -->
    <div class="uk-width-expand uk-margin">
    <section class="uk-section uk-padding uk-margin-left uk-section-primary uk-preserve-color">
        <div class="container">
                <div class="uk-card uk-card-default uk-card-body">
                    <h1 class="uk-heading-line"><span><?= strtoupper($film->titre)?><span></h1>
                    <div class="uk-flex">
                        <div>
                            <h3 class="uk-margin-remove">GENRES</h3>
                            <p class="uk-margin-remove"><?= $film->displayGenres()?></p>
                        </div>
                        <div class="uk-margin-left">
                            <h3 class="uk-margin-remove">REALISATEUR</h3>
                            <p class="uk-margin-remove"><?= $film->getRealisateur()?></p>
                        </div>
                        <div class="uk-margin-left">
                            <h3 class="uk-margin-remove">ANNEE</h3>
                            <p class="uk-margin-remove"><?= $film->getDateFormat()?></p>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <h3 class="uk-margin-remove">ACTORS</h3>
                        <div class="uk-flex uk-flex-wrap uk-flex-between">
                            <?php foreach($film->actors as $actors):?>
                                <div class="uk-flex uk-flex-column">
                                    <h4 class="uk-margin-remove"><?= $actors['prenom'].' '.$actors['nom'] ?></h4>
                                    <img class="uk-text-center" style="border-radius: 50%; margin: 15px auto" data-src="https://placeimg.com/100/100/people" width="75" height="75" alt="" uk-img>
                                    <p class="uk-text-center uk-margin-remove"><?= $actors['personnage']?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <p><?= $film->synopsis?></p>
                </div>
            
        </div>
    </section>
        
    </div>
    <div class="uk-width-large ">
        <div class="uk-padding uk-light uk-background-secondary">
        <h1>Nos nouveautés</h1>
        <ul class="uk-list uk-list-divider">
            <li><a class="uk-link-heading uk-link-text" href="">list item</a></li>
            <li><a class="uk-link-heading uk-link-text" href="">list item</a></li>
            <li><a class="uk-link-heading uk-link-text" href="">list item</a></li>
            <li><a class="uk-link-heading uk-link-text" href="">list item</a></li>
            <li><a class="uk-link-heading uk-link-text" href="">list item</a></li>
        </ul>
        <h1>Rechercher</h1>
        <form action="" method="post">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Chercher par titre</legend>
                <div class="uk-inline uk-margin" style="display:flex;">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input class="uk-input" type="text" name="search" placeholder="Titre">
                    <button class="uk-margin-left uk-button-secondary uk-button">submit</button>
                </div>
            </fieldset>
        </form>
        <form action="" method="post">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Filtrer</legend>
                <div class="uk-margin uk-grid-small uk-child-width-1-2 uk-grid">
                    <?php foreach($genres as $genre):?>
                        <label><input class="uk-checkbox uk-margin-right" type="checkbox" name="genres[]" value="<?= $genre['id']?>"><?= ucfirst($genre['name']) ?></label>
                    <?php endforeach; ?>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="date" name="date" id="date">
                </div>
                <button type="submit" class="uk-button uk-button-secondary">Filtrer</button>
            </fieldset>
        </form>   
        </div>     
    </div>
</div>