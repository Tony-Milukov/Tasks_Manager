<?php
require_once "Repositories/authRepository.php";
require_once "functions/signInFunction.php";
$loginError = false;
$userData = $_POST;

//if logout, it will logoOut the user
if ($_GET["action"] && $_GET["action"] == "signOut") {
    unset($_SESSION["user"]);
    $_SESSION["isLoggedIn"] = false;
    header('Location: /?page=signIn');
}
//if the user is already loggedIn, it will redirect the user to the home page
if ($_SESSION["isLoggedIn"]) {
    header('Location: /?page=home');
    die();
}

//if the user had inputted email & password in the fields, and inputted data are correct, he will be signedUp.
if (isset($userData["email"]) && isset($userData["password"])) {
    signIn();
}

require_once "view/SignInPage.php";




