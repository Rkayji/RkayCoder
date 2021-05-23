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
        Create a new Post
    </h1>
    <form action="<?= URLROOT ?>?url=posts/create" method="post">
        <div class="form-item">
            <input type="text" name="title" placeholder="Title...">
            <div class="invalidFeedback"><?= $data['titleError'] ?></div>
        </div>
        <div class="form-item">
            <textarea name="body" placeholder="Enter your post..."></textarea>
            <div class="invalidFeedback"><?= $data['bodyError'] ?></div>
        </div>
        <div>
            <button type="submit" class="btn green" name="submit">Submit</button>
        </div>
    </form>
</div>