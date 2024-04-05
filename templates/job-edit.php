<?php include './includes/header.php'; ?>
<div class="container py-4">
    <h2 class="page-header">Edit a Job Listing</h2>
    <form action="edit.php?id=<?php echo $job->id; ?>" method="POST">
        <div class="form-group py-2">
            <label for="company">Company</label>
            <input type="text" name="company" id="" class="form-control" value="<?php echo $job->company;  ?>">
        </div>
        <div class="form-group py-2">
            <label for="category">Category</label>
            <select type="text" name="category" id="" class="form-control">
                <option value="0">Choose Category</option>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($job->category_id == $category->id) : ?>
                        <option selected value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                    <?php else : ?>
                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group py-2">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" id="" class="form-control" value="<?php echo $job->job_title;  ?>">
        </div>
        <div class="form-group py-2">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="" class="form-control"><?php echo $job->description;  ?></textarea>
        </div>
        <div class="form-group py-2">
            <label for="location">Location</label>
            <input type="text" name="location" id="" class="form-control" value="<?php echo $job->location;  ?>">
        </div>
        <div class="form-group py-2">
            <label for="salary">Salary</label>
            <input type="text" name="salary" id="" class="form-control" value="<?php echo $job->salary;  ?>">
        </div>
        <div class="form-group py-2">
            <label for="contact_user">Contact user</label>
            <input type="text" name="contact_user" id="" class="form-control" value="<?php echo $job->contact_user;  ?>">
        </div>
        <div class="form-group py-2">
            <label for="contact_email">Contact email</label>
            <input type="text" name="contact_email" id="" class="form-control" value="<?php echo $job->contact_email;  ?>">
        </div>
        <div class="form-group py-2">
            <input class="btn btn-primary btn-lg py-2" type="submit" value="Update" />
        </div>
    </form>
    <br><br>
    <a href="index.php">Go Back</a>
</div>
<?php include './includes/footer.php'; ?>