<?php

session_start();



$user_email = $_POST['email'] ?? "";
$user_password = $_POST['password'] ?? "";

$usersFile = 'users.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];







$errorMessage = " ";

if (empty($email) || empty($password)) {
    $errorMessage = "Wrong Credentials";

}

if ($user_email == "rudro54@gmail.com" && $user_password == "Aur098") {
    $_SESSION['role'] = "admin";
    header("Location:index.php");

}

foreach ($users as $email => $user) {

    if ($user_email != "rudro54@gmail.com" && $user_password != "Aur098") {
        if ($user_email == $email && $user_password == $user["password"]) {

            $_SESSION['role'] = "user";
            header("Location:index.php");
        }
    }
}










?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>



    <div class="container mt-5 ">
        <h1 class="text-center"> Enter Into Your Account </h1>
        <form action="login.php" method="POST">
            <div class="form-group pb-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">

            </div>
            <div class="form-group pb-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                    placeholder="******">
            </div>
            <div class="form-group form-check pb-2">
                <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                <!-- will use cookie to remember this -->
            </div>
            <p class="text-warning">
                <?php

                echo $errorMessage;
                ?>

            </p>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Do Not Have An Account ? <a href="registration.php">Sign Up</a></p>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>