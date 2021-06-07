<?php 
    require_once('../init.php');

    $data = $_POST;
    $identifier = $data["identifier"];
    $password = $data["password"];

    $user_check = User::getUserFromIdentifier($identifier)[0];

    if( !$user_check ) {
        Flasher::setFlash('username/password', 'salah', 'danger');
        header('Location: ../views/view_login.php');
        die;
    }

    $user = new User($user_check["email"]);
    $result = $user->login($password);

    if( !$result ) {
        header('Location: ../views/view_login.php');
        die;
    }
    
    $_SESSION["email"] = $user_check["email"];
    $_SESSION["username"] = $user_check["username"];
    $_SESSION["id"] = $user_check["id"];
    $_SESSION["r"] = $user_check["role"];
    header('Location: ../views/view_article.php');
?>