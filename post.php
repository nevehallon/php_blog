<?php
$title = 'Post';
require_once 'functions/config.php';
require_once 'functions/blog_functions.php';

if (!isset($_GET['post_id'])) {
    header('Location:blog.php');
    die();
}

$id = (int) $_GET['post_id'];
$post = get_post($id);


require_once 'templates/header.php';
?>
<div class="card container-fluid post my-4">
    <?php if (!empty($post['image'])) : ?>
        <img style="width: 40vw;max-width: 100%; height: auto;" class="card-img-top my-0 mx-auto img-fluid" width="100%" src="<?= $post['image']; ?>">
    <?php endif; ?>
    <div class="card-body">
        <h1 class="card-title text-center"><?= $post['title']; ?></h1>
        <p>By <?= $post['author_name']; ?> /at <?= $post['created']; ?></p>
        <article class="card-text card container">
            <?= $post['content']; ?>
        </article>
    </div>

</div>
<?php require_once 'templates/footer.php'; ?>