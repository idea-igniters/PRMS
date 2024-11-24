<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>
    <div class="container">
    <h2>Registration Staff</h2>
        <?php

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $errors = array();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if (empty($username) OR empty($email) OR empty($password) OR empty($confirm_password)) {
                array_push($errors,'All Field Are Required');
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors,'Email is Not Valid');
            }
            if (strlen($password)<8) {
                array_push($errors,'Password must be 8 Characters long');
            }
            if ($password !== $confirm_password) {
                array_push($errors,"Password Didn't match try again");
                
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result =mysqli_query($conn,$sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors,"Email Already Exist!");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                
                }
                
            }else{
             
             $sql = "INSERT INTO users (username,email,password) VALUES ( ?, ?, ? )";
             $stmt = mysqli_stmt_init($conn);
             $preparestatement = mysqli_stmt_prepare($stmt,$sql);
             if ($preparestatement) {
                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-succes'>You are Registered Succesfully.</div>";
             }else{
                die("Something Went Wrong.");
             }
            }
        }

        ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submit" >
            </div>

            <div class="form-group">
                <a href="main.php"><input class="btn btn-primary" value="Go back" ></a>
            </div>
        </form>
        
    </div>
</body>
</html>
