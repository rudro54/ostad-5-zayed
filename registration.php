<?php

session_start();
// get creates query string : what we search in google that is get method

// this is the json file 
$usersFile = 'users.json';
// if no file then $users will be empty string and if file then we will get the contents in array format
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

// this function is to save user data inside file in json string format
function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

}

// you should not check all the input fields by isset rather check if the
// submit button is clicked or not 


//registration form handling : 
// always make one admin first



// getting if the button is pressed 
if (isset($_POST['register'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

}

$errorMessage = "";



if (empty($name) || empty($email) || empty($password)) {

    $errorMessage = "Please fill all the fields";

} else {
    if (isset($users[$email])) {

        $errorMessage = "Email already exists !!";
    } else {
        $users[$email] = [
            'name' => $name,
            'password' => $password,
            'role' => 'user',

        ];


        // there would be on user as admin by default inside json file 
        saveUsers($users, $usersFile);
        if ($_SESSION['role'] == "admin") {
            header("Location:admin.php");
        } else {
            header("Location:login.php");

        }




    }
}








?>








<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 ">
        <h3 class="text-center">Fill Up The Registration Form </h3>

        <?php
        if (isset($errorMessage)) {
            echo "<p>$errorMessage</p>";
        }
        ?>
        <form action="registration.php" method="POST">
            <div class="mb-3">
                <label for="user_name" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="user_name" id="user_name"
                    placeholder="Enter Your Full Name">

            </div>
            <div class="mb-3">
                <label for="user_email" class="form-label">Your email</label>
                <input type="email" class="form-control" name="user_email" id="user_email"
                    placeholder="Enter Your email">

            </div>
            <div class="mb-3">
                <label for="user_password" class="form-label">Your Password</label>
                <input type="password" class="form-control" name="user_password" id="user_password" placeholder="*****">
            </div>

            <input type="hidden" name="role" value="">

            <button type="submit" name="register" value="register" class="btn btn-primary">Register</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">

    </script>
</body>

</html>