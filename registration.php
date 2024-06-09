<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>

    <style>

        .form-container{
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
            margin: auto;
            margin-top: 50px;
            text-align: left;
        }

    </style>
</head>
<body>
  <div class="form-container">
    
    <form action="insert.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select><br><br>

        <input type="submit" value="Submit">

    </form>
  </div> 


    
</body>
</html>