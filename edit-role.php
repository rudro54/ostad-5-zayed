<?php



function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

}



if (isset($_GET['email'])) {
    $email = $_GET['email'];


}




$users = json_decode(file_get_contents('users.json'), true);

if (isset($_POST['update'])) {
    $new_role = $_POST['role'];

    if (isset($users[$email])) {
        $users[$email]['role'] = $new_role;
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
        header("Location:admin.php");
    }
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="text-center mt-5">
        <h5>Hello Admin!!</h5>
        <h6>You Are Going To Change Role Of :
            <?php echo $email ?>
        </h6>

    </div>




    <div class="container mt-5">



        <form class="form" method="POST">
            <label for="userRole">Role</label>
            <br>
            <?php
            foreach ($users as $email => $user) {

                if ($_GET['email'] == $email) {
                    $role = $user['role'];


                }
            }

            echo "<input type='text' class='form-control' name='role' id='userRole' 
           value=$role>"

                ?>
            <br>


            <button name="update" type="submit" class="btn btn-primary">Update Role</button>

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