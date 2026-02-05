<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            // Login success
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            // 🔴 CHANGE THIS TO YOUR HOME PAGE FILE
            header("Location: home.php"); 
            exit();
        } else {
            echo "❌ Incorrect password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "❌ Email not found. <a href='register.php'>Register here</a>";
    }
}
?>
