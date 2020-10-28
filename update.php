<?php include_once 'config/init.php'; ?>
<?php include_once 'config/session_auth.php'; ?>

<?php 
$database = new DatabaseAuth();
$db = $database->getConnection();
$user = new User($db);

if(!isset($_POST['updateSubmit'])){
	if(!isset($_POST['changePassSubmit'])){
		die();
	}
	else{	
		$old_pass = base64_encode(isset($_POST['old_pass']) ? $_POST['old_pass'] : die());
		$new_pass = base64_encode(isset($_POST['new_pass']) ? $_POST['new_pass'] : die());
		$status = $user->changePass(intval($_SESSION['uid']), $old_pass, $new_pass);
		if($status){
			redirect("dashboard.php", "Password Changed Successfully!", "success");
		}
		else{
			redirect("dashboard.php", "Old Password is not correct!", "error");
		}		
	}
}

else{
	$first_name = $_POST['fn'];
	$last_name = $_POST['ln'];
	$mobile = $_POST['mn'];
	$city = $_POST['ct'];

	$status = $user->updateUser(intval($_SESSION['uid']), $first_name, $last_name, $mobile, $city);

	if($status){
		redirect("dashboard.php", "Profile Updated Successfully!", "success");
	}
	else{
		echo "<h5 class='alert alert-danger'>Something went wrong, We are working to fix it.</h5>";
	}
}

?>

