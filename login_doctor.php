<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reg.css">
</head>
<body>
    <div class="container">
    <h2>Login as doctor</h2>
    <form action="login_doctor.php" method="POST">
        <?php
        if (isset($_POST['Login'])) {
          $email=$_POST['email'];
          $password=$_POST['password'];
          require_once "database.php";
          $sql = "SELECT * FROM doctor WHERE email = '$email'";
          $result =mysqli_query($conn,$sql);
          $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
          if ($user) {
            if (password_verify($password, $user["password"])) {
              header("Location: main.php");
              die();
            }else{
              echo "<div class='alert alert-danger'>Password does not Match</div>";

            }
          }else{
            echo "<div class='alert alert-danger'>Email does not Match</div>";
          }
        }


        ?>    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login" name="Login" >
        </div>
        <div class="form-group">
            <a href="index.php"><input class="btn btn-primary" value="Go back" ></a>
        </div>
      </form>

    </div>
</body>
</html>