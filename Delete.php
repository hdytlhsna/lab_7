<?php
include 'database.php';
include 'user.php';

$message = ""; // Initialize a variable to hold the success message

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['matric'])) {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);
    $user->deleteUser($matric);

    // Close the connection
    $db->close();

    // Set the success message
    $message = "User with matric $matric has been successfully deleted.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
</head>
<body>
    <?php
    // Display the success message if it is set
    if (!empty($message)) {
        echo "<p>" . htmlspecialchars($message) . "</p>";
    }
    ?>

</body>
</html>
