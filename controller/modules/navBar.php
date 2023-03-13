<?php
session_start();
$isLoggedIn = $_SESSION["isLoggedIn"];
$page = $_GET["page"];
?>

<div class="topnav">
    <a class="<?= $page == "home" ? "active" : "" ?>" href="?page=home">Home</a>
    <?php if(!$isLoggedIn): ?>
        <div>
            <a class="<?= $page == "signIn" ? "active" : "" ?>" href="?page=signIn">SignIn</a>
            <span  style="color: #f2f2f2;"> | </span>
            <a class="<?= $page == "signUp" ? "active" : "" ?>" href="?page=signUp">SignUp</a>
        </div>
    <?php else: ?>
        <a href="?page=signIn&action=signOut">SignOut</a>
        <a class="<?= $page == "tasks" ? "active" : "" ?>" href="?page=tasks">Tasks</a>
        <a class="<?= $page == "profile" ? "active" : "" ?>" href="?page=profile">Profile</a>
    <?php endif; ?>
</div>
