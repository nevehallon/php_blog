<?php
require 'functions/config.php';
require_once 'functions/blog_functions.php';
require 'templates/header.php';

$id = htmlspecialchars($_GET["post_id"]);
// prevent XSS   ^^
$post = get_post($id);

if (isset($_POST['edit_post'])) {
    require_once 'functions/process_edit_post.php';
}
?>
<section class="jumbotron">
    <div class="container">
        <?php if ($post) : ?>
            <?php
            $title = htmlentities($post['title'], ENT_HTML5, "utf-8", false);
            $content = htmlentities($post['content'], ENT_HTML5, "utf-8", false);
            ?>
            <?php if (validate_user() && $post['author_id'] == $_SESSION['user_id']) : ?>
                <h1 class="jumbotron-heading text-center">Edit post</h1>
                <h6 class="text-center">What do you want to change?</h6>
                <div class="row">
                    <div class="w-100 mx-auto">
                        <form method="post" enctype="multipart/form-data">
                            <?php require_once 'templates/notifications.php'; ?>
                            <div>
                                <p>
                                    <label for="post-title" class="form-label"><span class="text-danger">*</span>Title:</label>
                                    <input value="<?= $title; ?>" id="post-title" type="text" name="post_title" class="form-control">
                                </p>
                                <p><label for="post-content" class="form-label"><span class="text-danger">*</span>Content:</label>
                                    <textarea id="post-content" name="post_content" class="form-control"><?= $content; ?></textarea>
                                </p>
                                <p><label for="post-image" class="form-label">Update image</label>
                                    <input id="post-image" type="file" name="post_image" accept="image/*">
                                </p>
                                <p><input type="submit" value="Edit" name="edit_post" class="btn btn-primary btn-block">
                                </p>

                            </div>
                        </form>

                        <a href="blog.php" class="btn btn-warning btn-block">
                            Cancel
                        </a>
                    </div>
                </div>

            <?php else : ?>
                <div class="alert alert-danger text-center">You shouldn't be here 😡</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
<?php
require 'templates/footer.php';
