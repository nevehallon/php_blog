<?php
$title = 'Add post';
require_once 'functions/config.php';

if (!validate_user()) {
    header('Location:blog.php');
    die();
}

if (isset($_POST['add_new_post'])) {
    check_token();
    require_once 'functions/process_add_post.php';
}

require_once 'templates/header.php';
?>
<section class="jumbotron">
    <div class="container">
        <h1 class="jumbotron-heading text-center">Add new post</h1>
        <h6 class="text-center">What have you got to say?</h6>
        <?php require_once 'templates/notifications.php'; ?>
        <div class="row">
            <div class="w-100 mx-auto mx-auto">
                <form method="post" enctype="multipart/form-data">
                    <p><label for="post-title" class="form-label"><span class="text-danger">*</span> Title:</label>
                        <input id="post-title" type="text" name="post_title" class="form-control">
                    </p>
                    <p><label for="post-content"><span class="text-danger">*</span> Content:</label>
                        <textarea id="post-content" name="post_content" class="form-control"></textarea>
                    </p>
                    <p><label for="post-image" class="form-label">Image</label>
                        <input id="post-image" type="file" name="post_image" accept="image/*">
                    </p>
                    <input type="hidden" name="token" value="<?= get_token(); ?>">
                    <p>
                        <input type="submit" value="Add post" name="add_new_post" class="btn btn-primary btn-block">
                    </p>
                </form>
                <a href="blog.php" class="btn btn-warning btn-block">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</section>
<?php require_once 'templates/footer.php'; ?>