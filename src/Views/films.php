<div uk-grid>
    <div class="uk-width-expand">
    <div class="uk-padding uk-margin-left">
        <h1>Nos films</h1>
        <div>
            <div uk-grid class="uk-child-width-1-3 uk-grid-large">
            <?php foreach($films as $film): ?>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><?= $film->titre ?></h3>
                            <dl class="uk-description-list">
                                <dt>Genres</dt>
                                <dd><?= $film->displayGenres()?></dd>
                            </dl>
                        </div>
                        <div class="uk-card-footer">
                            <div class="uk-flex uk-flex-between">
                                <a href="film/<?=$film->id?>" class="uk-button uk-button-text uk-margin-left"><span uk-icon="icon: search"></span> Read more</a>
                                <a href="film/addWhishlist/1" class="uk-button uk-button-text uk-margin-right"><span uk-icon="icon: heart"></span> Whishlist</a>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php endforeach; ?>
            </div>
        </div>
        </div>
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