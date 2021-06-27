<nav class="top-nav">
    <a href="<?= URLROOT ?>" class="text-light mx-2" id="sitename"><?= SITENAME ?></a>
    <ul class="mt-3">
        <li><a href="<?= URLROOT ?>/pages/index">Home</a></li>
        <li><a href="<?= URLROOT ?>/pages/about">About</a></li>
        <li><a href="<?= URLROOT ?>/pages/projects">Projects</a></li>
        <li><a href="<?= URLROOT ?>/posts/index">Blog</a></li>
        <li><a href="<?= URLROOT ?>/pages/contact">Contact</a></li>
        <li class="btn-login">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="<?= URLROOT ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?= URLROOT ?>/users/login">Log in</a>
            <?php endif; ?>
        </li>
        <?php if (isset($_SESSION['username'])) {
            echo '<span id="userName">' . $_SESSION['username'] . '</span>';
        } ?>
    </ul>
</nav>