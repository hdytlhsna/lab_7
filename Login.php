<?php
// Start session
session_start();

// Initialize variables
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matric = $_POST['matric'];
    $password = $_POST['password'];
    $isAuthenticated = false;

    // Authenticate user
    foreach ($users as $user) {
        if ($user['matric'] === $matric && $user['password'] === $password) {
            $isAuthenticated = true;
            $_SESSION['matric'] = $matric;
            header('Location: registerform.php'); // Redirect to the page in Question 5
            exit();
        }
    }

    // If authentication fails
    if (!$isAuthenticated) {
        $error = 'Invalid username or password, try <a href="login.php">login</a> again.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login Page</h1>
    <form action="Read.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <p><a href="registerform.php">Register</a> here if you have not.</p>
    <?php
       if (!empty($error)){
        echo '<p style="color:red;">' . $error . '</p>';
       }
    ?>
</body>

</html>