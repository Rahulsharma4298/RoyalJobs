<?php include 'inc/header.php'; ?>
<head><title><?php echo $job->job_title . '-Latest Jobs in India'; ?></title></head>
<br>
	<h2 class="page-header"><?php echo $job->job_title; ?> (<?php echo $job->location; ?>)</h2>
	<h6>Posted By <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?> </h6>
<hr>
<p class="lead"><strong>Description: </strong><?php echo $job->description; ?></p>
<ul class="list-group">
	<li class="list-group-item"><strong>Company:</strong> <?php echo $job->company; ?></li>
	<li class="list-group-item"><strong>Salary:</strong> <?php echo $job->salary; ?></li>
	<li class="list-group-item"><strong>Contact Email:</strong> <?php echo $job->contact_email; ?></li>
</ul>
<br><br>
<a class="btn btn-primary" href="index.php">Go Back</a>


<?php include 'inc/footer.php'; ?>