<?php include_once 'config/init.php'; ?>

<?php 
if(isset($_SESSION['email'])){
    redirect("index.php");
    exit();
}

$template = new Template('templates/register_t.php');

echo $template;

?>

