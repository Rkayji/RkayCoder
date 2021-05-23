<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar dark">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<div class="container">
    <?php if (isLoggedIn()) : ?>
        <a href="<?= URLROOT ?>?url=posts/create" class="btn green">Create</a>
    <?php endif; ?>
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="container-item">
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) : ?>
                <a href="<?= URLROOT . "?url=posts/update/" . $post->post_id ?>" class="btn orange">Update</a>
                <form action="<?= URLROOT . "?url=posts/delete/" . $post->post_id ?>" method="post">
                    <input type="submit" value="delete" name="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <h2>
                <?= $post->title ?>
            </h2>
            <h3>
                <?= 'Created on : ' . date('F j h:m', strtotime($post->created_at)) ?>
            </h3>
            <p>
                <?= $post->body ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>