<?php
require APPROOT . '/views/includes/head.php';
?>
<div id="section-landing">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
    <div class="wrapper-landing">
        <h1>One man's crappy software</h1>
        <h2>is another man's full-time job</h2>
    </div>
</div>
<script>
    let sitename = document.getElementById('sitename');
    sitename.classList.add('pt-3');
</script>