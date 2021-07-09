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





    <div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add Question</h6>
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

        <div id="questions">
            <form name="createQuestion" id="createQuestion">

            <!-- Qysetion Category -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" id="category" value="">
                            <option selected>PHP</option>
                            <option>Python</option>
                            <option>Java</option>
                            <option>JavaScript</option>
                            <option>SQL</option>
                            <option>HTML</option>
                            <option>CSS</option>
                        </select>
                    </div>


                <!-- questions -->
                <div class="form-group">
                    <label for="Question">Question</label>
                    <input type="text" class="form-control" id="question" value="" placeholder="Enter Question">
                </div>

                <!-- opttions -->
                <div class="row">
                    <div class="col">
                    <input type="text" class="form-control" id="option1" value="" placeholder="First option">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" id="option2" value="" placeholder="Second option">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" id="option3" value="" placeholder="Third option">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" id="option4" value="" placeholder="Fourth option">
                    </div>
                </div>

                <!-- correct option -->
                <div class="form-group" style="margin-top:20px;">
                    <input type="number" class="form-control" id="answer" placeholder="Enter Correct Option">
                </div>

                <div style="color:#FF0000;" id="err"></div>

                <hr>
                
                <input id="submit" onClick="submitQuestion()" class="btn btn-primary" value="submit" type="button" name="submit">
            </form>
        </div>
        
    <script src="js/addQuestions.js"></script>

<?php
  // include "includes/footer.php";
  include "includes/scripts.php";
?>
