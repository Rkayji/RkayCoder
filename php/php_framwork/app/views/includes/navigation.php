<nav class="top-nav">
    <ul>
        <li><a href="<?= URLROOT ?>?url=pages/index">Home</a></li>
        <li><a href="<?= URLROOT ?>?url=pages/about">About</a></li>
        <li><a href="<?= URLROOT ?>?url=pages/projects">Projects</a></li>
        <li><a href="<?= URLROOT ?>?url=pages/blog">Blog</a></li>
        <li><a href="<?= URLROOT ?>?url=pages/contact">Contact</a></li>
        <li class="btn-login">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="<?= URLROOT ?>?url=users/logout">Log out</a>
            <?php else : ?>
                <a href="<?= URLROOT ?>?url=users/login">Log in</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>