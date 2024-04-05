<?php include './includes/header.php'; ?>
<div class="container py-4">
    <h2 class="page-header">
        <?php echo $job->job_title; ?> (<?php echo $job->location; ?>)
    </h2>
    <small>Posted By <?php echo $job->contact_user ?> on <?php echo $job->post_date ?> </small>
    <hr>
    <p class="lead"><?php echo $job->description ?></p>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Company: </strong><?php echo $job->company ?>
        </li>
        <li class="list-group-item">
            <strong>Salary: </strong><?php echo $job->salary ?>
        </li>
        <li class="list-group-item">
            <strong>Email: </strong><?php echo $job->contact_email ?>
        </li>
    </ul>
    <br><br>
    <a href="index.php">Go Back</a>
    <div class="well m-5 d-flex gap-3">
        <a href="edit.php?id=<?php echo $job->id ?>" class="btn btn-primary btn-lg">Edit</a>
        <form action="job.php" method="POST">
            <input type="hidden" name="del_id" value="<?php echo $job->id ?>">
            <input type="submit" value="Delete" class="btn btn-danger btn-lg">
        </form>
    </div>
</div>
<?php include './includes/footer.php'; ?>