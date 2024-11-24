
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRMS</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/admitmodal.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php 
  $conn= mysqli_connect("localhost","root","","patientrecords");
  ?>
</head>
<?php 
include('includes/sidebar.php');
session_start();
?>

<body>
  <!-- Main Content -->
<div class="main-content" style="margin-left: 190px; margin-right: -20px;">
    <!-- Header -->
    <div class="header-dashboard">
      <div>
        <h1 class="header-h1">Patient Table</h1>
      </div>
      <div class="dropdown" style="float:left;">
        <button class="dropbtn"><i class="far fa-user-circle"></i> Profile</button>
        <div class="dropdown-content" style="left:0;">
            <div class="submenu">
                <a href="#">Add User</a>
                <div class="submenu-content">
                    <a href="register.php">Staff</a>
                    <a href="register_doctor.php">Doctor</a>
                </div>
           </div>
            <a id="logoutBtn" class="logoutbtn">Logout</a>
      </div>
      
    </div>
</div>
<!--- fetching --->
<section class="p-3">  
    
    <div class="" style="display: flex;">
        <div class="">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-person-plus"></i> New Patient</button>
        </div>
    </div>
    <br>
    <?php
         if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Great!</strong> <?php echo $_SESSION['status'];?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          unset($_SESSION['status']);
         }
        ?>
    <div class="row">
       <div class="col-12">
          <table class="table table-striped table-hover mt-3 text-center table-bordered" id="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="data">
              <?php
              $host="localhost";
              $user="root";
              $pass="";
              $db="patientrecords";
              $conn=new mysqli($host,$user,$pass,$db);
              $fetch=mysqli_query($conn, "select * from patientdata1");
              $row=mysqli_num_rows($fetch);
              if ($row > 0) {
                while ($r = mysqli_fetch_array($fetch)) {
              ?>
                <tr>
                  <td>P-<?php echo $r['id'] ?></td>
                  <td><?php echo $r['name'] ?></td>
                  <td><?php echo $r['contactnumber'] ?></td>
                  <td><?php echo $r['sex'] ?></td>
                  <td><?php echo $r['age'] ?></td>
                  <td><?php echo $r['birthdate'] ?></td>
                  <td><?php echo $r['address'] ?></td>
                  <td><?php echo $r['admitdate'] ?></td>

                  <td>
                    <a href="view.php?id=<?php echo $r['id']; ?>" class='btn btn-success btn-sm'><i class='bi bi-eye'></i></a>
                    <a class='btn btn-primary btn-sm updatebtn'><i class='bi bi-pencil-square'></i></a>
                    <button class='btn btn-danger btn-sm deletebtn'><i class='bi bi-trash3'></i></button>
                  </td>
                </tr>
              <?php  
                }
              }
              ?>
           
              
            </tbody>
          </table>
      </div>
    </div>
  </div>
</section> 
<!-- Modal ADD -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1a7de0;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add patient</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add.php" method="POST">
        <div class="modal-body">
                <div class="form-group mb-3">
                  <label for="" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="" required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Contact</label>
                  <input type="text" class="form-control" name="contact" id=""required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Sex</label>
                  <select class="form-select" name="sex" aria-label="Default select example">
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Age</label>
                  <input type="number" class="form-control" name="age" id=""required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Birthday</label>
                  <input type="date" class="form-control" name="birthday" id=""required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id=""required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- View Modal -->


<!-- Update Modal -->
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1a7de0;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update.php" method="POST">
        <div class="modal-body">
                 <div class="form-group mb-3">
                  <label for="" class="form-label">Patient ID</label>
                  <input type="text" class="form-control" name="id" id="id" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Contact</label>
                  <input type="text" class="form-control" name="contact" id="contactnumber"required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Sex</label>
                  <input type="text" class="form-control" name="sex" id="sex"required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Age</label>
                  <input type="text" class="form-control" name="age" id="age"required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Birthday</label>
                  <input type="date" class="form-control" name="bday" id="bday"required>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id="address"required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update" class="btn btn-primary">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- delete -->
<div class="modal fade" id="delete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="delete1.php" method="POST">
              <input type="hidden" id="deleteid" name="deleteid">
              <div class="modal-body text-center">
                  <p class="fw-bold">Are you sure you want to delete this item?</p>
                  <p class="text-muted">This action cannot be undone.</p>
              </div>
              <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="deletedata" class="btn btn-danger">Delete</button>
              </div>
            </form>
        </div>
    </div>
</div>




<script src="JS/scripts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="JS/delete1.js"></script>
<script src="JS/update1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
<Script>
 $(document).ready(function(){
    $('#table').DataTable();
 });
</Script>
</body>

</html>
