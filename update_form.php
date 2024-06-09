<?php
include 'session.php';
include 'database.php';
include 'user.php';





// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Process the update using the matric value
    // For example, you can fetch the user data using the matric value and display it in a form for updating
    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();

    // Display the update form with the fetched user data
    // Example:
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>

        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column; /* Ensure content stacks vertically */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px; /* Add margin to separate from the form */
        }


        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 300px; /* Adjust the width as needed */
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #483248;
            color: white;
            cursor: pointer;
        }

        input[type="button"] {
            background-color: #C8A2C8;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #C8A2C8;
        }

        a {
            text-decoration: none;
            color: #007bff;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    </head>

    <body>
        <h2>Update User</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="matric" value=<?php echo $userDetails['matric']; ?>>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value=<?php echo $userDetails['name']?>><br>
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="">Please select</option>
                <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer')
                    echo "selected" ?>>Lecturer</option>
                    <option value="student" <?php if ($userDetails['role'] == 'student')
                    echo "selected" ?>>Student</option>
                </select><br><br>
            <input type="submit" value="Update"><a href="Q5.php">Cancel</a>
        </form>
        </body>

</html>

<?php
}
?>
