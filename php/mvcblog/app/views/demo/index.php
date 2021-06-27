<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar dark">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<?php
echo '<div class="container">'.$data['returns'].'</div>';
?>