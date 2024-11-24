<?php 
$conn= mysqli_connect("localhost","root","","patientrecords");
?>

<?php 
$query = "SELECT * FROM patientdata1 order by id desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['id'];
if ($lastid = " ") {
  $pid = "P-1";
}
else{
  $pid = substr($lastid,3);
  $pid = intval($pid);
  $pid = "P-" ($pid + 1);
}
?>