<?php
require_once './auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = loginUser($_POST['username'], $_POST['password']);

    if ($response['success']) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo $response['message'];
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
