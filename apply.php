<?php include_once 'config/init.php'; ?>
<?php include_once 'config/session_auth.php'; ?>

<?php 
$job = new Job;
$user = new User;

$data = array();
	$data['job_title'] = $_POST['job_title'];
	$data['company'] = $_POST['company'];
	$data['category_id'] = $_POST['category'];
	$data['description'] = $_POST['description'];
	$data['location'] = $_POST['location'];
	$data['salary'] = $_POST['salary'];
	$data['contact_user'] = $_POST['contact_user'];
	$data['contact_email'] = $_POST['contact_email'];


$template = new Template('templates/apply_t.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;



echo $template;

?>