
<?php 
  session_start();
  $conn= mysqli_connect("localhost","root","","patientrecords");


  if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $insert_query = "INSERT INTO patientdata1(name,contactnumber,sex,age,birthdate,address) VALUES('$name','$contact','$sex','$age','$birthday','$address')";
    $insert_query_run = mysqli_query($conn, $insert_query);
    $id = mysqli_insert_id($conn);

    if ($insert_query_run) {
      $_SESSION['status'] = "Data Inserted Succesfull your ID is <strong>P-$id</strong> " ;
      header('location: admit-patient.php');
    }
    else{
      $_SESSION['status'] = "Something went Wrong";
      header('location: admit-patient.php');
    }
  }


?>