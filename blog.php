<?php
require_once 'functions/config.php';
require_once 'functions/blog_functions.php';
require_once 'templates/header.php';


$posts = get_posts();
?>

<div class="container">
    <h1 class="text-center">Blog</h1>
    <?php if (validate_user()) : ?>
        <a class="btn btn-success" href="add_post.php">Add new post +</a>
    <?php endif; ?>

    <?php if ($posts) : ?>
        <div class="container">
            <?php
            while ($row = mysqli_fetch_assoc($posts)) :
                $title = htmlentities($row['post_title'], ENT_HTML5, "utf-8", false);
                $content = htmlentities($row['post_content'], ENT_HTML5, "utf-8", false);
                $image = $row['post_image'];
                $author_name = htmlentities($row['user_name'], ENT_HTML5, "utf-8", false);
                $excerpt = mb_strlen($content) < 400 ? $content : mb_substr($content, 0, 400) . '...';
            ?>

                <div class="card post my-3">

                    <?php if (!empty($image)) : ?>
                        <img class="card-img-top my-0 mx-auto" width="100%" src="<?= $image; ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="text-center card-title"><?= $title; ?></h2>
                        <?php if (validate_user() && $row['post_author'] == $_SESSION['user_id']) : ?>
                            <div class="actions">
                                <a href="edit_post.php?post_id=<?= $row['post_id']; ?>">
                                    <img src="css/img/pencil.png">
                                </a>
                                <a href="delete_post.php?post_id=<?= $row['post_id']; ?>">
                                    <img src="css/img/rubbish.png">
                                </a>
                            </div>
                        <?php endif; ?>
                        <p>By <?= $author_name ?> at <?= $row['post_created']; ?></p>
                        <div class="card-text"><?= $excerpt; ?></div>
                        <a class="btn btn-primary btn-block mt-5" href="post.php?post_id=<?= $row['post_id']; ?>">Read more</a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    <?php endif; ?>
</div>

<?php
require 'templates/footer.php';
