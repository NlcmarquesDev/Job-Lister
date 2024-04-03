<?php


include_once './config/init.php';
// require_once './lib/Job.php';
// require_once './lib/Template.php';

$job = new Job;

$template = new Template('templates/frontpage.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;

if ($category > 0) {
    $template->title = 'Latest Jobs from ' . $job->getCategory($category);
    $template->jobs = $job->getByCategory($category);
} else {
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();

echo $template;
