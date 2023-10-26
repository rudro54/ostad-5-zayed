<?php

session_start();

$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

// echo $email;
// echo "<br>";
// echo $password;

$fp = fopen("./data/users.txt", "r");

$roles = array();
$emails = array();
$passwords = array();
$errorMessage = "";

while ($line = fgets($fp)) {
    $values = explode(",", $line);
    // role,email,password

    array_push($roles, trim($values[0]));
    array_push($emails, trim($values[1]));
    array_push($passwords, trim($values[2]));



}

fclose($fp);

for ($i = 0; $i < count($roles); $i++) {

    if ($emails[$i] == $email && $passwords[$i] == $password) {

        $_SESSION["role"] = $roles[$i];
        $_SESSION["email"] = $emails[$i];

        header("Location:index.php");
    } else {
        $errorMessage = "Wrong Email Or Password";
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