<?php include 'inc/header.php'; ?>
<head>
	<script src="css/switch.js"></script>
  <script src="css/sweetalert.min.js"></script>
</head>

<body>

    <section id="profile">
      <?php displayMessage(); ?>
    <div class="container">
      <div class="row">
          <div class="row user-left-part">
              <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                  <div class="row ">
                      <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                          <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                          <h1><?php echo ucfirst($ud['first_name'])." ".ucfirst($ud['last_name']); ?></h1>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                          <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-primary btn-block follow">Change Password</button> 
                          <button class="btn btn-danger btn-block" onclick="window.location='logout.php'">Logout</button>                               
                      </div>
                      <div class="row user-detail-row btn btn-primary text-center mx-auto">
                          <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                              <div class="border"></div>
                              <p>JOBS APPLIED</p>
                              <span><?php echo $count['count(jobs.id)']; ?></span>
                          </div>                           
                      </div>
                     
                  </div>
              </div>
  
              <div class="col-md-9 col-sm-9 col-xs-12 pull-right">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left text-center">
                                <h1 class="text-center">Welcome, <?php echo ucfirst($ud['first_name'])." ".ucfirst($ud['last_name']); ?></h1>
                            <hr style="width:100%;text-align:left;margin-left:0">
                            
                            <div id="menu-card">
                            <div class="card">
                                <a class="card-block stretched-link text-decoration-none" onclick="showTab(0);"></a>
                                <div class="card-body">
                                  <i class="fa fa-user"></i>
                                  <h5 class="card-title">My Profile</h5>
                                </div>
                              </div>
                              
                              <div class="card">
                                <a class="card-block stretched-link text-decoration-none" onclick="showTab(1);"></a>
                                <div class="card-body">
                                  <i class="fa fa-briefcase"></i>
                                  <h5 class="card-title">Applied Jobs</h5>
                                </div>
                              </div>

                              <div class="card">
                                <a class="card-block stretched-link text-decoration-none" onclick="showTab(2);"></a>
                                <div class="card-body">
                                  <i class="fa fa-bell"></i>
                                  <h5 class="card-title">Notifications</h5>
                                </div>
                              </div></div>

                            <div class="tab container"><h3>My Profile</h3><hr>
                              <form class="form-edit" method="POST" action="update.php">
                                <fieldset disabled id="fs1">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputFirstName">First Name</label>
                                    <input name = "fn"type="text" value="<?php echo $ud['first_name']; ?>" id="inputFirstName" placeholder="First Name" class="form-control">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputLastName">Last Name</label>
                                    <input name="ln" type="text" value="<?php echo $ud['last_name']; ?>" class="form-control" id="inputLastName" placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail">Email</label>
                                  <input name="em"type="email" value="<?php echo $ud['email']; ?>" readonly class="form-control" id="inputEmail" placeholder="Email">
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputMobile">Mobile No.</label>
                                    <input name="mn" type="text" value="<?php echo $ud['mobile']; ?>" class="form-control" id="inputMobile" placeholder="Mobile No.">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input name="ct" type="text" value="<?php echo $ud['city']; ?>" class="form-control" id="inputCity" placeholder="City">
                                  </div>
                                </div></fieldset>
                                <button type="submit" name="updateSubmit" id="saveBtn" disabled class="btn btn-primary">Save</button><br></form>
            
                                <div class="btn-group">
                                  <button class="btn btn-success" id="btnEdit" onclick="document.getElementById('fs1').disabled = false;document.getElementById('saveBtn').disabled = false;">Edit</button>
                                  <button onclick="showCurrent(0);" id="btnBack" class="btn btn-dark">Back</button>
                                </div>
                              
                              
                              
                            
                                </div>
                                <div class="tab applied-jobs container"><h3>Applied Jobs</h3>
                                  <?php if(count($jd)>0): ?>
                                  <div class="table-responsive">
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">JobID</th>
                                        <th scope="col">Title</th>
                                       <!-- <th scope="col">Category</th> -->
                                        <th scope="col">Apply Date</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <?php foreach($jd as $job): ;?>                        
                                      <tr>
                                        <th scope="row"><?php echo $job->id; ?></th>
                                        <td><?php echo $job->job_title; ?></td>
                                        <td><?php echo $job->apply_date; ?></td>
                                        <td><a href=""><?php echo $job->status; ?></a></td>
                                      </tr>
                                      <?php endforeach; ?>
                                    
                                    </tbody>
                                  </table></div> <?php else: echo '<br><h5 class="alert alert-danger">You have not applied for any job yet.</h5>'; ?>
                                <?php endif; ?>
                                
                  
                                  <button onclick="showCurrent(1);" class="btn btn-dark">Back</button>
                                
                                </div>
                                <div class="tab"><h3>Notifications</h3>
                                  <p class="alert btn-danger"><i class="fa fa-bell"> No New Notification</p></i>
                                  
                                  <button onclick="showCurrent(2);" class="btn btn-dark">Back</button>
                                </div>
                            </div>

                          </div>
                        </div>
                    </div></div></div>
                      
                                          </div>
                                          </div>
                                          </div>
                                          </div>
                                        
    

 
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title">Change Password</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="update.php">
                  <div class="form-group">
                      <label for="oldPass">Old Password</label>
                      <input type="text" name="old_pass" id="oldPass" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="newPass">New Password</label>
                      <input type="text" id="newPass" name="new_pass" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" name="changePassSubmit" class="btn btn-primary">Change Password</button>
                </form>
              </div>
          </div>
      </div>
  </div>        
  </section>

</body>


<?php
include 'inc/footer.php';
?>
