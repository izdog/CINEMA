<form action="" method="POST">
    <div>
        <?php if(isset($errors['username'])):?>
            <p><?= $errors['username']?></p>
        <?php endif; ?>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <?php if(isset($errors['password'])):?>
            <p><?= $errors['password']?></p>
        <?php endif; ?>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">Log in</button>
</form>