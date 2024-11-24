
<?php 
  session_start();
  $conn= mysqli_connect("localhost","root","","patientrecords");


  if (isset($_POST['deletedata'])){
    $id = $_POST['deleteid'];

    $number = preg_replace('/\D/', '', $id);

    $query = "DELETE FROM patientdata1 WHERE id='$number'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      $_SESSION['status'] = "Data DELETED Succesfully!";
      header('location: admit-patient.php');
    }
    else{
      $_SESSION['status'] = " But  Error Something went Wrong";
      header('location: admit-patient.php');
    }
  }


?>