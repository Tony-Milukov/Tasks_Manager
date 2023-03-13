<?php
require_once "Repositories/tasksRepository.php";
function signIn ($email = null, $password = null) {
    $userData = $_POST;
    if($_GET["page"] == "signIn") {
        global $loginError;
    }
    
    //if email has been given as property, it will be used, else, the POST data will be used.
    $email = $email ?? strip_tags($userData["email"]);
    $password = $password ?? strip_tags($userData["password"]);
    $user = getUserByEmailAndPassword($email,($password));

    if($user) {
        $loginError = false;
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["user"] = [
            "userInfo" => $user,
        ];
        header('Location: /?page=home');
    }  else {
        $loginError = true;
    }
}