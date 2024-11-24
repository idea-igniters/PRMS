
<?php 
  session_start();
  $conn= mysqli_connect("localhost","root","","patientrecords");


  if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $birthday = $_POST['bday'];
    $address = $_POST['address'];

    $number = preg_replace('/\D/', '', $id);

    $query = "UPDATE patientdata1 SET name='$name', contactnumber='$contact', sex='$sex', age='$age', bday='$birthday', address='$address' WHERE id='$number'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      $_SESSION['status'] = "Data Updated Succesfully!";
      header('location: admit-patient.php');
    }
    else{
      $_SESSION['status'] = " But Something went Wrong";
      header('location: admit-patient.php');
    }
  }


?>