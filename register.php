<?php 
require 'config.php'; 
$message = "";

if (isset($_POST['register'])) {
    $user = $_POST['reg_user'];
    $pass = $_POST['reg_pass'];
    
    // Logic: Search array to see if user exists
    $exists = false;
    foreach ($_SESSION['users'] as $u) {
        if ($u['username'] == $user) { $exists = true; break; }
    }

    if ($exists) {
        $message = "<p style='color:red;'>Username already exists!</p>";
    } else {
        $_SESSION['users'][] = ['username' => $user, 'password' => $pass];
        $message = "<p style='color:green;'>Registration successful! <a href='login.php'>Login here</a></p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Create Account</h2>
        <form method="POST">
            <input type="text" name="reg_user" placeholder="Choose Username" required>
            <input type="password" name="reg_pass" placeholder="Choose Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <?php echo $message; ?>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>