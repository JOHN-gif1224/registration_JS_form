<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'path' => '/',
    'domain' => 'localhost', // Change this to your domain if needed
    'secure' => false, // Set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

if(!isset($_SESSION["last_regeneration"])) {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
} else {
    $interval = 60 * 30; // 30 minutes
    if(time() - $_SESSION["last_regeneration"] > $interval) {
        session_regenerate_id(true);
    }
}

function regenerate_session_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}