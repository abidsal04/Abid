<?php 
    session_start();
    if(!isset($_SESSION['admin']['name'])){
      header("location:index.php");
    }
?>

<?php 
  include "includes/header.php";
  include "includes/navbar.php";
?>
      
      


    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Questions</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="admin.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="addQuestions.php" class="btn btn-sm btn-neutral">Add Question</a>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <!-- Dark table -->
          <div class="row">
            <div class="col">
              <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                  <h3 class="text-white mb-0">Question Category</h3>
                </div>
                  

                <div id="accordion">

                    <?php 
                        include '../config.php';

                        $getSql = "SELECT DISTINCT `category` FROM `question`";
                        $getQuery = mysqli_query($con, $getSql);

                        $k=1;                        
                        while ($rows = mysqli_fetch_array($getQuery)) {
                    ?>


                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $k; ?>" aria-expanded="false" aria-controls="collapse<?php echo $k; ?>">
                            <?php echo $rows['category']; ?>
                            </button>
                        </h5>
                        </div>

                        <div id="collapse<?php echo $k ?>" class="collapse" aria-labelledby="category<?php echo $k ?>" data-parent="#accordion">
                        <div class="card-body">

                        <?php
                            $category = $rows['category'];
                            $queSql = "SELECT * FROM `question` WHERE `category`='$category'";
                            $queQuery = mysqli_query($con, $queSql);
                            
                            $i=1;
                            while ($que = mysqli_fetch_array($queQuery)) {
                        ?>
                            <h5>Q<?php echo $i; ?>.<?php echo $que['question']; ?><h5>

                            <div class="form-check mt-1 ml-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="<?php echo $que['option1']; ?>" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                <?php echo htmlentities($que['option1']); ?>
                            </label>
                            </div>

                            <div class="form-check mt-1 ml-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="<?php echo $que['option2']; ?>" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                <?php echo htmlentities($que['option2']); ?> 
                            </label>
                            </div>

                            <div class="form-check mt-1 ml-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="<?php echo $que['option3']; ?>" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                <?php echo htmlentities($que['option3']); ?>
                            </label>
                            </div>

                            <div class="form-check mt-1 ml-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="<?php echo $que['option4']; ?>" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                <?php echo htmlentities($que['option4']); ?>
                            </label>
                            </div>
                        <?php $i++; } ?>
                        </div>
                        </div>
                    </div>
                    <?php $k++; } ?>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>





<?php
  // include "includes/footer.php";
  include "includes/scripts.php";
?>

</div>