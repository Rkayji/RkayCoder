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
        <h2>Register</h2>
        <form action="<?= URLROOT ?>?url=users/register" method="post">
            
            <input type="text" name="username" placeholder="Uesrname *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['usernameError'] ?></span>
            
            <input type="text" name="email" placeholder="Email *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['emailError'] ?></span>
            
            <input type="password" name="password" placeholder="Password *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['passwordError'] ?></span>

            <input type="password" name="confirmPassword" placeholder="Confirm Password *" autocomplete="off">
            <span class="invalidFeedback"><?= $data['confirmPasswordError'] ?></span>
            
            <button type="submit" value="submit" id="submit">Submit</button>
            <p class="options">Have an account ? <a href="<?= URLROOT ?>?url=users/login">Log in here!</a></p>
        </form>
    </div>
</div>