<?php
session_start();
$pdo = new PDO("sqlite:database.db");
$userId = $_SESSION["user"]["userInfo"]["id"];

//This function gets all tasks for this user by users id and puts them into session
function getTasksByUserId()
{
    global $pdo;
    global $userId;
    $statement = $pdo->prepare('SELECT * FROM tasks WHERE userId = :userId');
    $statement->execute([
        ":userId" => $userId
    ]);
    $_SESSION["user"]["tasks"] =  $statement->fetchAll(PDO::FETCH_ASSOC);
}

//This function adds a new task to the database
function addTask($taskValue):void
{
    global $pdo;
    global $userId;
    $statement = $pdo->prepare('INSERT INTO tasks (taskValue,userId,creationDate) VALUES (:taskValue,:userId,:creationDate)');
    $statement->execute([
        ":taskValue" => $taskValue,
        ":userId" => $userId,
        "creationDate" => date("d.m.Y H:i:s'")
    ]);
   
}

//This function marks the task WHERE id = $id as done
function markAsDone($id) {
    $markAs = null;
    foreach ($_SESSION["user"]["tasks"] as $task) {
        if($task["id"] == $id)  {
            $markAs = $task["markedAsDone"] == "0" ? 1 : 0;
        }
    }
    
    global $pdo;
    $statement = $pdo->prepare('UPDATE tasks SET markedAsDone = :markedAsDone WHERE id = :id');
    $statement->execute([
        ":id" => $id,
        ":markedAsDone" => $markAs
    ]);
}

