<?php
session_start();

// not allowing anyone rather than admin to enter into this 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
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
    <h5>Hello Admin!!</h5>
    <p>You need to create a new user ? <a href="registration.php">Sign Up</a></p>
    <form action="logout.php" method="POST">
        <button name="kill" class="btn btn-primary">Kill This Session</button>

    </form>
    <h2 class="text-center">Now You Can See All Users Here</h2>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>





                <?php


                foreach ($users as $email => $user) {

                    if ($email != "rudro54@gmail.com") {
                        echo "<tr>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['role'] . "</td>";
                        echo "<td>" . $email . "</td>";
                        echo "<td><a class='btn btn-sm btn-primary' name='edit' href='edit-role.php?email=$email'>Edit</a></td>";
                        echo "<td><a class='btn btn-sm btn-primary' name='delete' href='delete-user.php?email=$email'>Delete</a></td>";
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