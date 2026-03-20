<?php
require_once _DIR_ . '/../config/database.php';
require_once 'validator.php';
require_once 'error_handler.php';

session_start();

function registerUser($username, $password) {
    global $pdo;

    validateInput($username, "Username");
    validateInput($password, "Password");

    $hashed = password_hash($password, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed]);

        return ["success" => true];

    } catch (Exception $e) {
        return handleError($e);
    }
}

function loginUser($username, $password) {
    global $pdo;

    validateInput($username, "Username");
    validateInput($password, "Password");

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return ["success" => true];
        }

        return ["success" => false, "message" => "Invalid credentials"];

    } catch (Exception $e) {
        return handleError($e);
    }
}

    $stmt->close();
}
?>
