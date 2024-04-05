<?php

include_once './config/init.php';

$job = new Job;
$template = new Template('templates/job-edit.php');

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

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


    if ($job->update($job_id, $data)) {

        redirect('index.php', 'Your job has been updated', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}

$template->job = $job->getJob($job_id);
$template->categories = $job->getCategories();

echo $template;