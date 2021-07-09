<?php 
    session_start();
    if(!isset($_SESSION['user']['name'])){
      header("location:index.php");
    }
?>

<?php 
  include "includes/header.php";
  include "includes/navbar.php";
?>




    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $_SESSION['user']['name']; ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <input id="edit" onClick="editEnable()" class="btn btn-primary" value="Edit Profile" type="button" name="edit">
            <input id="edit" onClick="passwordEnable()" class="btn btn-primary" value="Change Password" type="button" name="change">
            <h4 style="color:red;">
              <?php if(isset($_SESSION['user']['checkMail'])){
                    echo $_SESSION['user']['checkMail'];
              } ?>
            </h4>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">



        <!-- <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  Jessica Jones<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
              </div>
            </div>
          </div>
        </div> -->




        <div class="col-xl-8 order-xl-1">

          <!-- profile -->
          <div class="card" id="profile">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-4">
                  <h3 class="mb-0">Profile </h3>
                </div>
                <div class="col-4" style="color:#FF0000;" id="err">
                </div>
                <div class="col-4 text-right">
                    <input id="update" onClick="update()" class="btn btn-primary" value="Update" type="button" name="update" disabled>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email address</label>
                        <input type="email" id="email" class="form-control" value="<?php echo $_SESSION['user']['email']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" value="<?php echo $_SESSION['user']['phone']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="companyName">Company Name</label>
                        <input type="text" id="companyName" class="form-control" value="<?php echo $_SESSION['user']['companyName']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="address">Address</label>
                        <input type="text" id="address" class="form-control" value="<?php echo $_SESSION['user']['address']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control" placeholder="City" value="New York" disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States" disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control" disabled>Student at AIMT.</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>


          <!-- change password -->
          <div class="card" id="ChangePassword" style="display:none">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-4">
                  <h3 class="mb-0">Change Password</h3>
                </div>
                <div class="col-4 text-right">
                    <input id="update" onClick="changePassword()" class="btn btn-primary" value="change" type="button" name="change">
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Enter Passwords</h6>
                <div class="pl-lg-4">

                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="oldpassword">Old Password</label>
                        <input type="password" id="oldpassword" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="newpassword">New Password</label>
                        <input type="password" id="newpassword" class="form-control">
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                
                <div class="col-4" style="color:#FF0000;" id="err1"></div>
                
                </div>
              </form>
            </div>
          </div>

        </div>
    
    

      <script src="js/editprofile.js"></script>


<?php
  include "includes/footer.php";
  include "includes/scripts.php";
?>