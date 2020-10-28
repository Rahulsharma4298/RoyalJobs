<?php include_once 'config/init.php'; ?>

<?php 
$job = new Job;


$template = new Template('templates/main.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;
$search_keywords = isset($_GET['q']) ? $_GET['q'] : null;
$search_city = isset($_GET['city']) ? $_GET['city'] : null;

if($category){
	$template->jobs = $job->getByCategory($category);
	if(!$template->jobs){
		$template->title = 'No Jobs Available in this Category';
	}
	else{
	$template->title = 'Jobs In '. $job->getCategory($category)->name;
	}
	
}else{
	if($search_keywords){
		if($search_city){
			$template->jobs = $job->getJobBySearch($search_keywords, $search_city);
			
		}
		elseif($search_keywords && !$search_city){
			$template->jobs = $job->getJobBySearch($search_keywords);
		}

		if(!$template->jobs)
			$template->title = 'No Jobs Available for the Search';
	
		else
			$template->title = "Jobs for the Search - \"{$search_keywords}\"";

	}

	else{
			$template->title = 'Recent Jobs';
			$template->jobs = $job->getAllJobs();
		}
	
}


$template->categories = $job->getCategories();

echo $template;

?>