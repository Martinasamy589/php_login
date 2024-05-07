<?php
include "config.php";
if (isset($_POST['login'])) {
    // Login logic
    $name = $_POST['name'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM iduser WHERE name = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Start session
            session_start();
            // Store user data in session variables if needed
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            // Redirect to a logged-in page or display a message
            echo "Login Successful";
        } else {
            echo "Invalid name or password";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
