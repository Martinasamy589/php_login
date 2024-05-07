<?php
/*require_once('config.php');*/
?>


<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>login</h1>
<form action="login.php" method="post">
    <div>
        <label>name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <input type="submit" name="login" value="login">
</form>
</body>
</html>