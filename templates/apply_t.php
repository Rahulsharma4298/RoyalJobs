<?php include 'inc/header.php';?>
<?php date_default_timezone_set('Asia/Kolkata'); ?>
<head>
	<title>RoyalJobs - Apply</title>
	<script src="css/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<body>
	<section id="log-reg-con">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Apply For Job</h5>
                        <form id=applyJobForm enctype="multipart/form-data" class="mb-3 form-signin">
                            <div class="form-group"> <input type="text" name="h_education" class="form-control" placeholder="Highest Education" required autofocus></div>
                            <div class="custom-file">
    						<input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" onclick="$('#msg').html('');">
    						<label class="custom-file-label" for="chooseFile">Upload Resume</label>
                            <div class="statusMsg text-center">
                            <p id="msg" class="text-danger" style="display: none; margin-bottom: 50px;">  
                            </p>
                            </div>
                    

    					
 							</div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase submitBtn" type="submit" name="applyJob">Apply
                        </form>

                        <?php displayMessage(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <script>
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#applyJobForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'apply.php?jid=3',
            data: new FormData(this),
            //dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#applyJobForm').css("opacity",".5");
            },
            success: function(response){;
                if(response==1){
                        swal("You have Successfully Applied for this Job!", "Good Luck!", "success");
                        setTimeout(function(){window.location="index.php";}, 1060);
                       

                }else{
                    $('#applyJobForm')[0].reset();
                    $('#msg').show();
                    $('#msg').html(response);
                }
               
                $('#applyJobForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
</script>
</body>


<?php include 'inc/footer.php';?>