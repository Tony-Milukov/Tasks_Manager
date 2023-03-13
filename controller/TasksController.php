<?php
require_once "Repositories/commentsRepository.php";
require_once "Repositories/tasksRepository.php";
require_once "controller/functions/isLoggedIn.php";

//getting data into $_SESSION
getTasksByUserId();
getCommentsByUserId();

$userData = $_REQUEST;
$tasks = $_SESSION["user"]["tasks"];
$tasksComments = $_SESSION["user"]["comments"];
#
if ($userData["newComment"]) {
    $newComment = strip_tags($userData["newComment"]);
    addNewComment($userData["addCommentId"], $newComment);
    header('Location: /?page=tasks');
}
if (isset($userData["markAsDone"])) {
    markAsDone($userData["markAsDone"]);
    header('Location: /?page=tasks');
}

if (!empty(strip_tags($_POST["taskValue"]))) {
    addTask(strip_tags($_POST["taskValue"]));
    header('Location: /?page=tasks');
}

require_once "./view/TasksPage.php";