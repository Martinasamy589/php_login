<?php
require_once('config.php');

if(isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['password_con']; // Corrected name attribute

    // Check if passwords match
    if ($password !== $repeatpassword) {
        echo "Passwords do not match";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO iduser (name, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $email, $hashed_password]);
        echo "Success";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Sign Up</h1>
<form action="registration.php" method="post"> <!-- Corrected action attribute -->
    <div>
        <label>Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label>Repeat Password:</label>
        <input type="password" id="password_con" name="password_con" required>
    </div>
    <input type="submit" name="create" value="Sign Up">
</form>
</body>
</html>
