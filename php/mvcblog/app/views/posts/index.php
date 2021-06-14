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
        <a href="<?= URLROOT ?>/posts/create" class="btn btn-success">Create</a>
    <?php endif; ?>
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="container-item">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) : ?>
                    <a href="<?= URLROOT . "/posts/update/" . $post->post_id ?>" class="btn btn-warning">Update</a>
                    <a class="btn btn-danger" href="<?= URLROOT . "/posts/delete/" . $post->post_id  ?>">Delete</a>
                <?php endif; ?>
            </div>
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