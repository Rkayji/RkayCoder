<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<div class="container-login">
    <div class="wrapper-login">
        <h2>Sign in</h2>
        <form action="<?= URLROOT ?>/users/login" method="post">
            <input type="text" name="username" placeholder="Uesrname *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['usernameError'] ?></span>
            <input type="password" name="password" placeholder="Password *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['passwordError'] ?></span>
            <button type="submit" value="submit" id="submit">Submit</button>
            <p class="options">Not register yet ? <a href="<?= URLROOT ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div>