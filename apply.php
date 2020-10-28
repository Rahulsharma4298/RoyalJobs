<?php include_once 'config/init.php'; ?>
<?php include_once 'config/session_auth.php'; ?>

<?php 
$job = new Job;
$job_id = isset($_GET['id']) ? $_GET['id'] : null;
$uid = $_SESSION['uid'];
$apply_date = date('Y-m-d H:i:s');
$highest_education = isset($_POST['h_education']) ? $_POST['h_education'] : null;
$target_dir = "uploads/";

if($job_id){
	$template = new Template('templates/apply_t.php');
	echo $template;
}

if(!isset($job_id) and !isset($_GET['jid'])) header("Location: index.php");

if(isset($_GET['jid'])){
		if(!$highest_education) header("Location: index.php");
		$resume_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
		$file_upload_status  = $job->uploadFile($uid, $resume_file);
		if($file_upload_status['status']) {
			$status = $job->applyJob($uid, $_GET['jid'], $resume_file, $highest_education, $apply_date);
			if($status){
				echo 1;
			}
			else{
				echo '<script>alert("Something went wrong! Contact us for support")</script>';
			}
		}
		else
		{	echo $file_upload_status['message'];
			
		}
	}



?>