    <div class="uk-container uk-flex uk-flex-center uk-flex-middle" uk-height-viewport="offset-top: true">
    <form class="uk-width-medium" action="" method="POST">
        <div class="uk-margin">
            <div class="uk-inline" style="display: flex;">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input uk-form-large" type="text" name="username" placeholder="username/email">
            </div>
        </div>
        <?php if(isset($errors['username'])):?>
            <div class="uk-alert uk-alert-danger"><?= $errors['username']?></div>
        <?php endif; ?>
        <div class="uk-margin">
            <div class="uk-inline" style="display: flex;">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-large" type="password" name="password" placeholder="password">
            </div>
        </div>
        <?php if(isset($errors['password'])):?>
                <div class="uk-alert uk-alert-danger"><?= $errors['password']?></div>
        <?php endif; ?>
        <button class="uk-button uk-button-primary uk-button-large">Log in</button>
        <a class="uk-button uk-button-default uk-button-large" href="signout">Sign out</a>
    </form>
    </div>
    
