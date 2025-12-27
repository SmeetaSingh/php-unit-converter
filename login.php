<?php 
require 'config.php'; 
$err = "";

if (isset($_POST['login'])) {
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $_POST['user'] && $user['password'] == $_POST['pass']) {
            $_SESSION['active_user'] = $user['username'];
            header("Location: converter.php");
            exit();
        }
    }
    $err = "Invalid credentials!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: sans-serif; background: #e9ecef; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p style="color:red;"><?php echo $err; ?></p>
        <p>New? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>