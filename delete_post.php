<?php
$title = "Delete post";
require 'functions/config.php';
require 'functions/blog_functions.php';
// require 'templates/header.php';

if (!isset($_GET['post_id'])) {
    header('Location: blog.php');
    die();
}

$id = (int) $_GET['post_id'];
$post = get_post($id);

if (!validate_user() || $post['author_id'] != $_SESSION['user_id']) {
    header('Location: blog.php');
    die();
}

if (isset($_POST['delete_post'])) {
    require_once 'functions/process_delete_post.php';
}

require_once "./post.php";
?>
<script>
    let card = document.querySelector(".card");
    card.innerHTML = `
<section class="jumbotron">
    <div class="container text-center">
        <h1 class="jumbotron-heading">Delete post</h1>
        <h5 class="text-secondary">Are you sure that you want to delete this post?</h5>
        <div>
            <form method="post">
                <input type="submit" value="DELETE POST" name="delete_post" class="btn btn-danger btn-block">
            </form>
        </div>
    </div>
</section>` + card.innerHTML;
</script>
<?php

require 'templates/footer.php';
