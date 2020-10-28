<?php include 'inc/header.php';?>

<script src="css/sweetalert.min.js"></script>
<body>
<div class="banner text-center">
        <h1>FIND JOBS & INTERNSHIPS</h1>
        <p>Apply Today and Get Hired!</p>
    </div>
</section>

<div class="search-job text-center">
  <form method="GET" action="index.php#jobs" ng-submit="submitSearch()" role="form" name="studentForm" novalidate>
  <input type="text" class="form-control" name="q" placeholder="Search keywod" ng-class="{'has-error': submitSearch.q.$touched && submitSearch.q.$error.required , 'has-success': submitSearch.q.$valid }">
  <input type="text" class="form-control" name="city" placeholder="Location">
  <button type="submit" class="btn btn-primary">Find Job</button> 
</form>
</div>

<section id="cat">
  <div class="container text-center">
    <h3>Categories</h3>
      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="index.php?category=5#jobs"></a>
        <div class="card-body">
          <i class="fa fa-desktop"></i>
          <h5 class="card-title">Programming</h5>
        </div>
      </div>
      
    
      

      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="index.php?category=1#jobs"></a>
        <div class="card-body">
          <i class="fa fa-database"></i>
          <h5 class="card-title">Data Entry</h5>
        </div>
      </div>

      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="index.php?category=6#jobs"></a>
        <div class="card-body">
          <i class="fa fa-graduation-cap"></i>
          <h5 class="card-title">Internships</h5>
        </div>
      </div>

      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="index.php?category=2#jobs"></a>
        <div class="card-body">
          <i class="fa fa-building-o"></i>
          <h5 class="card-title">Construction</h5>
        </div>
      </div>

      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="index.php?category=3#jobs"></a>
        <div class="card-body">
          <i class="fa fa-shopping-bag"></i>
          <h5 class="card-title">Retail</h5>
        </div>
      </div>

      <div class="card">
        <a class="card-block stretched-link text-decoration-none" href="#"></a>
        <div class="card-body">
          <i class="fa fa-ellipsis-h"></i>
          <h5 class="card-title">More</h5>
        </div>
      </div>
</section>

<section id="jobs">
  <div class="container">
    <h3 class="text-center"><?php echo $title ?></h3>
    <?php foreach($jobs as $job): ?>
    <div class="company-details">
      <div class="job-update">
        <h4><b><?php echo $job->job_title; ?></b></h4>
        <p><?php echo $job->company; ?></p>
        <i class="fa fa-briefcase"></i><span>0-1 yrs</span></br>
        <i class="fa fa-inr"></i><span><?php echo $job->salary; ?></span></br>
        <i class="fa fa-map-marker"></i><span><?php echo $job->location; ?></span></br>
        <!--<p>Skills <i class="fa fa-angle-double-right"></i><small>java</small>
        <small>python</small> <small>HTML,CSS</small> <small>. Net</small></p> -->
          <p>Description <i class="fa fa-angle-double-right"></i><?php echo $job->description; ?>
          <!-- <a href="#">Read More</a></p> -->
      </div>
      <div class="apply-btn">
        <button type="button" class="btn btn-primary" onclick="window.location='apply.php?id=<?php echo $job->id; ?>'">Apply</button>
      </div>
    </div>
    <?php endforeach; ?>
     <!-- <ul class="page-link text-center">
      <li class="left-arrow">&#8592</li>
       <li class="active">1</li>
       <li>2</li>
       <li>3</li>
       <li>4</li>
       <li>5</li>
       <li class="right-arrow">&#8594</li>
     </ul> -->
  </div>
</section>

<section id="site-stats">
  <div class="container text-center">
    <h3>ROYALJOBS STATES</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-6">
            <div class="state-box">
              <i class="fa fa-user-o"></i><span><small>100k +</small></span>
              <p>Job Seekers</p>
            </div>
          </div>

          <div class="col-6">
            <div class="state-box">
              <i class="fa fa-slideshare"></i><span><small>500k +</small></span>
              <p>Employers</p>
            </div>
          </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-6">
                <div class="state-box">
                  <i class="fa fa-hand-peace-o"></i><span><small>10k +</small></span>
                  <p>Active Jobs</p>
                </div>
              </div>
    
              <div class="col-6">
                <div class="state-box">
                  <i class="fa fa-building"></i><span><small>400k +</small></span>
                  <p>Companies</p>
                </div>
              </div>
              </div>
              </div>
          </div>
          </div>
</section>

<section id="app-banner" class="text-center">
  <h1>Find Jobs On Mobile, Download RoyalJobs App </h1>
  <p class="text-dark"><strong>Will be Available soon.</strong></p>
  <img src="images/app_store.png">
  <img src="images/play_store.png">
</section>
<?php displayMessage(); ?>
</body>

<?php include 'inc/footer.php';?>