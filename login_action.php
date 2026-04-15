<?php

session_start();
require_once 'db.php';
require_once 'User.php';

$db = new Database();
$dbconn = $db->getConnection();

$user = new User($dbconn);


if($_SERVER['REQUEST_METHOD']==="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loggedInUser = $user->login($email,$password);

    if($loggedInUser){
        echo "Login successful! Welcome, " . $loggedInUser['name'];
    }else{
        echo "Invalid email or password.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login_action.php" method="post">
        <label for="email">Email: </label>
        <input 
    </form>
</body>
</html>