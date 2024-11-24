<?php 
include('includes/header.php'); 
include('includes/sidebar.php') 
?>
<link rel="stylesheet" href="css/view.css">
<link rel="stylesheet" href="css/opdadd.css">
<div class="main-content" style="margin-left: 200px; margin-right: -20x">
    <!-- Header -->
    <div class="header-dashboard" style="margin-top: 0%;">
      <h1 class="header-h1">Patient Records</h1>
      <a href="admit-patient.php" class="btn btn-primary btn-sm" style="margin-right: 30px;">  Back  </a>
    </div>

      <?php 
       if(isset($_GET['id'])){
        include('conn.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM patientdata1 WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
       }
      ?>

      
    
    <div class="infocontent" id="clearfix">
      <div class="div1 border border-5">
        <h6>Patient Name:</h6>
        <h3><b><?php echo $row['name'] ?></h3></b>
      </div>
      <div class="div2 border border-5">
        <h6>Patient ID:</h6>
        <h2><b>P-<?php echo $row['id'] ?></b></h2>
      </div>
    </div>
    <div class="infocontent1" id="clearfix">
      <div class="div1 border border-5">
        <div class="info-header">
          <h5>Details</h5>
          <button><i class="bi bi-pencil-fill fs-5"></i></button>
        </div>
        <div>
          <label>
            Address:
          </label>
          <h4>
            <b>
              <?php echo $row['address'] ?>
            </b>
          </h4>
        </div>
        <div>
          <label>
            Contact No:
          </label>
          <h4>
            <b>
              <?php echo $row['contactnumber'] ?>
            </b>
          </h4>
        </div>
        <div>
          <label>
            Age:
          </label>
          <h4>
            <b>
              <?php echo $row['age'] ?>
            </b>
          </h4>
        </div>
        <div>
          <label>
            Sex:
          </label>
          <h4>
            <b>
              <?php echo $row['sex'] ?>
            </b>
          </h4>
        </div>
        <div>
          <label>
            Birthdate:
          </label>
          <h4>
            <b>
              <?php echo $row['birthdate'] ?>
            </b>
          </h4>
        </div>
        <div>
          <label>
            Date Added:
          </label>
          <h4>
            <b>
              <?php echo $row['admitdate'] ?>
            </b>
          </h4>
        </div>
    </div>
      <div class="div2 border border-5">
        <div class="diagnosis-header">
          <h5>OPD Findings</h5>
          <button><a href="view.php?id=<?php echo $row['id'] ?>"><i class="bi bi-box-arrow-in-left fs-2"></i></a></button>
        </div>
        <div class="opd-body">
          <div class="history">
            <div class="ill">
              <div style="width: 300px; margin-left: 50px">
                <label style="margin-bottom: 3px;">History of Present Illness</label>
                <input type="text" name="illness" class="form-control">
              </div>
              <div style="width: 300px; margin-left: 50px">
                <label style="margin-bottom: 3px;">Physical Examination</label>
                <input type="text" name="illness" class="form-control">
              </div>
              <div style="width: 300px; margin-left: 50px">
                <label style="margin-bottom: 3px;">Diagnosis</label>
                <input type="text" name="illness" class="form-control">
              </div>
              <div style="width: 300px; margin-left: 50px">
                <label style="margin-bottom: 3px;">Prescription/Medication</label>
                <input type="text" name="illness" class="form-control">
              </div>
            </div>
          </div>
          <div class="vital">
            
              <h5>Vital Sign</h5>
            
            <div class="vitaldiv1">
              <div>
                <label for="">Temperature</label>
                <input type="text" class="form-control" placeholder="TEMP">
              </div>
              <div>
                <label for="">Weight</label>
                <input type="text" class="form-control" placeholder="WT">
              </div>
              <div>
                <label for="">Respiratory Rate</label>
                <input type="text" class="form-control" placeholder="RR">
              </div>
            </div>
            <div class="vitaldiv2">
            <div>
                <label for="">Blood Pressure</label>
                <input type="text" class="form-control" placeholder="BP">
              </div>
              <div>
                <label for="">Pulse Rate</label>
                <input type="text" class="form-control" placeholder="PR">
              </div>
              <div>
                <label for="">Capillary Refill</label>
                <input type="text" class="form-control" placeholder="CR">
              </div>
            </div>
          </div>
          <div class="btndiv">
            <a class="btn btn-success saveopd"> Save </a>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
<Script>
 $(document).ready(function(){
    $('#table').DataTable();
 });
</Script>
</html>