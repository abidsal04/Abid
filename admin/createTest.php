<?php 
    session_start();
    if(!isset($_SESSION['adminName'])){
      header("location:login.php");
    }
?>

<?php 
  include "includes/header.php";
  include "includes/navbar.php";
?>





    <div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Create Test</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center" style="margin-top:30px">


    
    <div id="details">
        <form name="createTest" id="createTest">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="testName">Test Name</label>
                    <input type="text" class="form-control" id="testName" name="testName" placeholder="Eg. Php">
                    <div style="color:#FF0000;" id="error1">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="passingMarks">Passing Marks(%)</label>
                    <input type="text" class="form-control" id="passingMarks" name="passingMarks" placeholder="Eg. 70">
                    <div style="color:#FF0000;" id="error2">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="negativeMarking">Negative Marking</label>
                    <select id="negativeMarking" class="form-control" name="negativeMarking" id="negativeMarking">
                        <option selected>Yes</option>
                        <option>No</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="publishDate">Publish Date</label>
                    <input type="date" class="form-control" id="publishDate" placeholder="dd/mm/yyyy" min="2020-01-01" max="2030-12-31">
                </div>
            </div>

            <?php 
                include 'database/config.php';

                $getSql = "SELECT DISTINCT `category` FROM `question`";
                $getQuery = mysqli_query($con, $getSql);

                $i=1;                        
                while ($rows = mysqli_fetch_array($getQuery)) {
            ?>

            <div class="form-row">
              <div class="custom-control custom-switch ml-5 mb-3">
                <input type="checkbox" class="custom-control-input" id="customSwitch<?php echo $i; ?>" value="<?php echo $rows['category']; ?>">
                <label class="custom-control-label" for="customSwitch<?php echo $i; ?>"><?php echo $rows['category']; ?></label>
              </div>
            </div>

            <?php $i++; } ?>

            <input type="hidden" id="countCategory" value = "<?php echo $i-1; ?>">
            <div style="color:#FF0000;" id="error3"></div>

            <input id="submit" onClick="submitDetail()" class="btn btn-primary" value="Next" type="button" name="submit">
        </form>
    </div>


    <script src="js/createTest.js"></script>

<?php
  // include "includes/footer.php";
  include "includes/scripts.php";
?>
</div>