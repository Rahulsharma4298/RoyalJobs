<?php include_once 'config/init.php'; ?>

<?php 
$job = new Job;


$template = new Template('templates/main.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
	$template->jobs = $job->getByCategory($category);
	if(!$template->jobs){
		$template->title = 'No Jobs Available in this Category';
	}
	else{
	$template->title = 'Jobs In '. $job->getCategory($category)->name;
	}
	
}else{
	$template->title = 'Recent Jobs';
	$template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();

echo $template;

?>