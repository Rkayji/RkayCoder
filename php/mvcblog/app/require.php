<?php
// require the libraries from libraries folder
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

require_once 'helpers/session_helper.php';

// require vendor folder 
//Load Composer's autoloader
require 'vendor/autoload.php';
// require 'vendor/smtp/PHPMailerAutoload.php';

require_once 'config/config.php';
// Initiate the core class
$init = new Core();