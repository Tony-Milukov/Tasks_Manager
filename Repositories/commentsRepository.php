<?php
session_start();

$pdo = new PDO("sqlite:database.db");
$userId = $_SESSION["user"]["userInfo"]["id"]; //PRIMARY KEY (users)

//This function gets all comments for this user by users id and puts them into session
function getCommentsByUserId():void
{
    global $pdo;
    global $userId;
    $statement = $pdo->prepare("SELECT * FROM comments WHERE userId = :userId");
    $statement->execute([
        ":userId" => $userId,
    ]);
    $_SESSION["user"]["comments"] = $statement->fetchAll(PDO::FETCH_ASSOC);
}

//This function adds a new Comment to the database with userId
function addNewComment($taskId, $commentValue): void
{
    global $pdo;
    global $userId;
    $statement = $pdo->prepare("INSERT INTO comments (userId, taskId, creationDate, commentValue) VALUES (:userId, :taskId, :creationDate, :commentValue)");
    $statement->execute([
        ":userId" => $userId,
        ":creationDate" => date('d.m.Y H:i:s'),
        ":taskId" => $taskId,
        "commentValue" => $commentValue,
    ]);
}
