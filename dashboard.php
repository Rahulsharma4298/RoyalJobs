<?php include_once 'config/init.php'; ?>
<?php include_once 'config/session_auth.php'; ?>

<?php 
$template = new Template('templates/dashboard_t.php');
$database = new DatabaseAuth();
$db = $database->getConnection();
$user = new User($db);
$template->ud = $user->getUserDetails(intval($_SESSION['uid']));
echo $template;




?>

