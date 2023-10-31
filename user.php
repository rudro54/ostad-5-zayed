<?php
session_start();

// not allowing anyone rather than user to enter into this 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location:login.php");
}

$users = json_decode(file_get_contents('users.json'), true);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h5>Hello User!!</h5>
    <form action="logout.php" method="POST">
        <button type="submit" name="kill" class="btn btn-primary">Kill This Session</button>

    </form>
    <h2 class="text-center">Now You Can See All Users Here</h2>
    <h6 class="text-center">Your Visibility Is Only Limited To See Only</h6>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>


                </tr>
            </thead>
            <tbody>





                <?php

                foreach ($users as $email => $user) {


                    if ($user['role'] == 'user') {
                        echo "<tr>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['role'] . "</td>";
                        echo "<td>" . $email . "</td>";
                        echo "<tr>";



                    }
                }

                ?>























            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>