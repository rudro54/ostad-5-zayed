<?php



$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$role = "user";
// everybody will be user by default

$errorMessage = "";


if ($email != "" && $password != "") {
    $fp = fopen("./data/users.txt", "a");
    fwrite($fp, "\n {$role}, {$email}, {$password}");
    fclose($fp);

    header("Location:login.php");

} else {
    $errorMessage = "Please input email and password to proceed further!!";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>



    <div class="container mt-5 ">
        <h1 class="text-center"> Create An Account </h1>
        <form action="signup.php" method="POST">
            <div class="form-group pb-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter your email">

            </div>
            <div class="form-group pb-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                    placeholder="******">
            </div>


            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <p class="text-warning">
            <?php

            echo $errorMessage;
            ?>

        </p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>