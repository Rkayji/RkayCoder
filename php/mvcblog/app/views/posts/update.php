<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar dark">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Update Post
    </h1>
    <form action="<?= URLROOT ?>?url=posts/update/<?= $data['post']->post_id ?>" method="post">
        <div class="form-item">
            <input type="text" name="title" value="<?= $data['post']->title ?>">
            <div class="invalidFeedback"><?= $data['titleError'] ?></div>
        </div>
        <div class="form-item">
            <textarea name="body"><?= $data['post']->body ?></textarea>
            <div class="invalidFeedback"><?= $data['bodyError'] ?></div>
        </div>
        <div>
            <button type="submit" class="btn green" name="submit">Submit</button>
        </div>
    </form>
</div>