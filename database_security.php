<?php
require "env_config.php";
require "error_handling.php";

$conn = new mysqli($env["DB_HOST"], $env["DB_USER"], $env["DB_PASS"], $env["DB_NAME"]);

if ($conn->connect_error) {
    handleError("Database connection failed");
}
?>
