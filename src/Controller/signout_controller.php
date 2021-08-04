<?php

session_start();

session_destroy();
unset($_SESSION);
$params = session_get_cookie_params();
setcookie(
    session_name(),
    null,
    strtotime('yesterday'),
    $params["params"], $params["domain"],
    $params["secure"],$params["httponly"]
);
header("location: signin_controller.php");
exit;