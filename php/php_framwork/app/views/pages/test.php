<?php

if ($data['users']) {
    foreach ($data['users'] as $user) {
        echo "user_id: " . $user->user_id;
        echo "<br>";
        echo "Name: " . $user->user_name;
        echo "<br>";
        echo "Email: " . $user->user_email;
        echo "<br>";
    }
}

?>