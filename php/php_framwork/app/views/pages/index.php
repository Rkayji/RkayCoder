<?php
if ($data) {
    foreach ($data['users'] as  $user) {
        echo 'Name : ' . $user->user_name;
        echo '<br>';
        echo 'Email : ' . $user->user_email;
        echo '<br>';
    }
}
