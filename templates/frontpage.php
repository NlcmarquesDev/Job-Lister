<?php include './includes/header.php'; ?>

<main>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-center fs-xl">Find a Job</h1>
                <form action="index.php" method="GET">
                    <select name="category" class="form-control my-4" id="">
                        <option value="0">Choose Category</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="text-center ">

                        <input class="btn btn-primary btn-lg w-50" type="submit" value="Find" />
                    </div>
                </form>
            </div>
        </div>
        <?php displayMessage(); ?>
        <h3><?php echo $title ?></h3>
        <div class="row align-items-md-stretch ">
            <?php foreach ($jobs as $key => $job) : ?>
                <div class="col-md-6 my-3">
                    <div class="h-100 p-5 <?php echo ($key % 2 == 0) ? 'text-bg-dark' : 'bg-body-tertiary border' ?> rounded-3">
                        <h2><?php echo $job->job_title ?></h2>

                        <p><?php
                            echo $job->description ?></p>
                        <a href="job.php?id=<?php echo $job->id ?>" class="btn btn-outline-<?php echo ($key % 2 == 0) ? 'light' : 'secondary' ?>" type="button">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="page-info text-lg">
            <?php
            if (!isset($_GET['page-nr'])) {
                $page = 1;
            } else {
                $page = $_GET['page-nr'];
            }
            ?>
            Showing <?php echo $page . ' of ' . $pages ?>
        </div>
        <div class="pagination gap-2">
            <a href="?page-nr=1">First</a>
            <?php if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) { ?>
                <a href="?page-nr=<?php echo $_GET['page-nr'] - 1; ?>">Previous</a>
            <?php } else { ?>
                <a>Previous</a>
            <?php } ?>
            <div class="page-numbers">
                <?php for ($counter = 1; $counter <= $pages; $counter++) { ?>
                    <a class="<?php echo ($_GET['page-nr'] == $counter) ? 'active' : ''; ?>" href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                <?php } ?>
            </div>
            <?php if (!isset($_GET['page-nr'])) { ?>
                <a href="?page=nr=2">Next</a>
                <?php
            } else {
                if ($_GET['page-nr'] >= $pages) { ?>
                    <a> Next</a>
                <?php } else { ?>

                    <a href="?page-nr=<?php echo $_GET['page-nr'] + 1; ?>">Next</a>
            <?php }
            } ?>
            <a href="?page-nr=<?php echo $pages ?>">Last</a>
        </div>
    </div>

    <?php include './includes/footer.php'; ?>