    <div class="uk-container uk-height-medium uk-flex uk-flex-center uk-flex-middle">
    <form action="" method="POST">
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input" type="text" name="username">
            </div>
        </div>
        <?php if(isset($errors['username'])):?>
            <div class="uk-alert uk-alert-danger"><?= $errors['username']?></div>
        <?php endif; ?>
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                <input class="uk-input" type="text" name="password">
            </div>
        </div>
        <?php if(isset($errors['password'])):?>
                <div class="uk-alert uk-alert-danger"><?= $errors['password']?></div>
        <?php endif; ?>
        <button class="uk-button uk-button-primary">Log in</button>
    </form>
    </div>
    
