<?php


include_once './config/init.php';

$job = new Job;

$template = new Template('templates/job-create.php');
$template->categories = $job->getCategories();
// if ($isset($_POST['submit'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //create a Data Array
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    // var_dump($data);
    if ($job->create($data)) {
        redirect('index.php', 'Your job has been listed', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}



echo $template;
