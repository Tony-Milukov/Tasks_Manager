<?php
$pdo = new PDO("sqlite:database.db");

//if the given email exist it wolud return true, if not,  it would return FALSE
function ifEmailExist($email): bool
{
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->execute([
        ":email" => $email,
    ]);
    return $statement->fetch() ? false : true;
}

//This function returns a user array if the email & password are correct. If the email | password are not correct, it would return FALSE.
function getUserByEmailAndPassword($email,$password) {
    global $pdo;

    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $statement->execute([
        ":email" => $email,
        ":password" => md5($password . $email)
    ]);
    $fetchedData = $statement->fetch(PDO::FETCH_ASSOC);
    unset($fetchedData["password"]);
    if($fetchedData) {
        return $fetchedData;
       
    } else {
        return false;
    }
    
}

//This function adds a new user to the database if the email doesn't exist there and returns TRUE. If the email already exists at the database, it would return FALSE.
function addNewUser($email, $password, $name, $lastname): bool
{
    global $pdo;
    if (ifEmailExist($email)) {
        $statement = $pdo->prepare('INSERT INTO users (`email`,`password`,`name`,`last_name`,`registration_date`) VALUES (:email,:password,:name,:lastname,:registration_date)');
        $statement->execute([
            ":email" => $email,
            ":password" => md5($password . $email),
            ":name" => ucfirst($name),
            ":lastname" => ucfirst($lastname),
            ":registration_date" => date('d.m.Y H:i:s')
        ]);
        return true;
    } else {
       return false;
    }
}

