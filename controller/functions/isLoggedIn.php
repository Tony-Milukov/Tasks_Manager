<?php
if (!$_SESSION["isLoggedIn"]) {
    header('Location: /?page=signIn');
    die();
}