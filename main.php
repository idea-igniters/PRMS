<?php 
include('includes/header.php');
include('includes/sidebar.php');
?>

<body>


  <!-- Main Content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header-dashboard">
      <div>
        <h1 class="header-h1">Dashboard Overview</h1>
      </div>
      <div class="dropdown">
        <button class="dropbtn"><i class="far fa-user-circle"></i>Profile</button>
        <div class="dropdown-content">
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

    <!-- Dashboard Widgets/Stats -->
    <div class="dashboard">
      <div class="card">
        <h3>Total Patients</h3>
        <p>0</p>
      </div>

      <div class="card">
        <h3>Admitted Today</h3>
        <p>0</p>
      </div>

      <div class="card">
        <h3>Discharged</h3>
        <p>0</p>
      </div>

      <div class="card">
        <h3>Doctors on Duty</h3>
        <p>0</p>
      </div>
    </div>
  </div>
  <script src="JS/scripts.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
