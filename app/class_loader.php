<?php

require_once "config/config.php";
require_once "helpers/url_helper.php";
require_once "helpers/message_helper.php";
require_once "helpers/UserValidator.php";

// require_once "libraries/Database.php";
// require_once "libraries/Core.php";
// require_once "libraries/Controller.php";

spl_autoload_register(function ($class) {
    require_once 'libraries/' . $class . '.php';
});
