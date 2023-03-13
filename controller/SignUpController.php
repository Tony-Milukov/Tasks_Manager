<?php
require_once "functions/signInFunction.php";
require_once "Repositories/authRepository.php";

if ($_SESSION["isLoggedIn"]) {
    header('Location: /?page=home');
    die();
}

$userData = $_POST;

if(isset($userData["email"],$userData["password"],$userData["name"],$userData["lastname"])){
    $email = strip_tags($userData["email"]);
    $password = strip_tags($userData["password"]);
    $name = strip_tags($userData["name"]);
    $lastname = strip_tags($userData["lastname"]);
   if(addNewUser($email,$password,$name,$lastname)) {
        signIn($email,$password);
   } else {
       $signUpError = true;
   }
}
require_once "view/SignUpPage.php";