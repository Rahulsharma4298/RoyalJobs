<?php include 'inc/header.php'; ?>
<head>
	<script src="css/switch.js"></script>
</head>

<body>

    <section id="profile">
    <div class="container">
      <div class="row">
          <div class="row user-left-part">
              <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                  <div class="row ">
                      <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                          <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                          <h1><?php echo $ud['first_name']." ".$ud['last_name']; ?></h1>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                          <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-primary btn-block follow">Change Password</button> 
                          <button class="btn btn-danger btn-block" onclick="window.location='logout.php'">Logout</button>                               
                      </div>
                      <div class="row user-detail-row btn btn-primary text-center mx-auto">
                          <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                              <div class="border"></div>
                              <p>JOBS APPLIED</p>
                              <span>320</span>
                          </div>                           
                      </div>
                     
                  </div>
              </div>
  
              <div class="col-md-9 col-sm-9 col-xs-12 pull-right">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left text-center">
                                <h1 class="text-center">Welcome, <?php echo $ud['first_name']." ".$ud['last_name']; ?></h1>
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
                              <form class="form-edit">
                                <fieldset disabled>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail">Email</label>
                                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputMobile">Mobile No.</label>
                                    <input type="text" class="form-control" id="inputMobile" placeholder="Mobile No.">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="City">
                                  </div>
                                </div></fieldset>
                                <button type="submit" class="btn btn-primary">Save</button><br></form>
            
                                <div class="btn-group">
                                  <button class="btn btn-success" id="btnEdit">Edit</button>
                                  <button onclick="showCurrent(0);" id="btnBack" class="btn btn-dark">Back</button>
                                </div>
                              
                              
                              
                            
                                </div>
                                <div class="tab applied-jobs container"><h3>Applied Jobs</h3>
                                  <div class="table-responsive">
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">JobID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Apply Date</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><a href="">@mdo</a></td>
                                        <td><a href="">@mdo</a></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td><a href="">@mdo</a></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                        <td><a href="">@mdo</a></td>
                                      </tr>
                                    </tbody>
                                  </table></div>
                  
                                  <button onclick="showCurrent(1);" class="btn btn-dark">Back</button>
                                
                                </div>
                                <div class="tab"><h3>Notifications</h3>
                                  <p class="alert btn-primary"><i class="fa fa-bell"> You request has been approved.</p></i>
                                  <p class="alert btn-primary"><i class="fa fa-bell"></i> You request have been selected for job 1.</p></i>
                                  
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
                                        
    

 
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="contact">Edit Profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                  </div>
                  <div class="form-group">
                      <label for="txtFullname">Nombre completo</label>
                      <input type="text" id="txtFullname" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="txtEmail">Email</label>
                      <input type="text" id="txtEmail" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="txtPhone">Teléfono</label>
                      <input type="text" id="txtPhone" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
              </div>
          </div>
      </div>
  </div>        
  </section>

</body>

<?php
include 'inc/footer.php';
?>