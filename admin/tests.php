<?php 
    session_start();
    if(!isset($_SESSION['adminName'])){
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
              <h6 class="h2 text-white d-inline-block mb-0">Tests</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="admin.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="createTest.php" class="btn btn-sm btn-neutral">Create Test</a>
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
                  <h3 class="text-white mb-0">Test Data</h3>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">SNO</th>
                        <th scope="col" class="sort" data-sort="budget">TEST NAME</th>
                        <th scope="col" class="sort" data-sort="status">Category</th>
                        <th scope="col" class="sort" data-sort="completion">NEGATIVE MARKING</th>
                        <th scope="col" class="sort" data-sort="completion">PASSING MARKS</th>
                        <th scope="col" class="sort" data-sort="completion">REPORT</th>
                        <th scope="col" class="sort" data-sort="completion">PUBLISHED ON</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">

                    <?php 
                        include 'database/config.php';

                        $getSql = "SELECT * FROM `testinfo`";
                        $getQuery = mysqli_query($con, $getSql);

                        $i=1;
                        while ($rows = mysqli_fetch_array($getQuery)) {
                      ?>

                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['category'] ?></td>
                        <td><?php echo $rows['negativeMarking'] ?></td>
                        <td><?php echo $rows['passingMarks'] ?>%</td>
                        <td><?php echo $rows['report'] ?></td>
                        <td><?php echo $rows['publishDate'] ?></td>

                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              
                              <a class="dropdown-item" href="database/generateReport.php?test_id=<?php echo $rows['test_id']?>">
                                <i class="ni ni-send text-default"></i>Generate Report
                              </a>
                              <a class="dropdown-item" href="database/deleteTest.php?test_id=<?php echo $rows['test_id']?>">
                              <i class="ni ni-fat-remove text-default"></i>Delete
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>

                      <?php $i++; } ?>

                    </tbody>
                  </table>
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