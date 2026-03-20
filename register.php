<?php
require_once './auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = registerUser($_POST['username'], $_POST['password']);

    if ($response['success']) {
        echo "Registered successfully";
    } else {
        echo $response['error'];
    }
}
?>

<form method="POST">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Register</button>
</form>
