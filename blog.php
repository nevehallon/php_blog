<?php
require_once 'functions/config.php';
require_once 'functions/blog_functions.php';
require_once 'templates/header.php';


$posts = get_posts();
?>

<div class="container">
    <h1 class="text-center">Blog</h1>
    <?php if (validate_user()) : ?>
        <a class="btn btn-success" href="add_post.php">➕ Add new post 📰</a>
    <?php else : ?>
        <a class="btn btn-primary" href="registration.php">Signup ✨</a>
        or
        <a class="btn btn-success" href="login.php">Login 🚀</a>
    <?php endif; ?>

    <?php if ($posts) : ?>
        <div class="container">
            <?php
            while ($row = mysqli_fetch_assoc($posts)) :
                $title = htmlentities($row['post_title'], ENT_HTML5, "utf-8", false);
                $content = htmlentities($row['post_content'], ENT_HTML5, "utf-8", false);
                $image = $row['post_image'];
                $author_name = htmlentities($row['user_name'], ENT_HTML5, "utf-8", false);
                $author_image = $row['user_image'];
                $excerpt = mb_strlen($content) < 400 ? $content : mb_substr($content, 0, 400) . '...';
            ?>

                <div class="card post my-3">
                    <div class="d-flex align-items-center justify-content-between py-2 border">
                        <?php if (!empty($author_image)) : ?>
                            <img style="max-width: 100%; height: auto;" class="border border-primary rounded-circle d-inline img-fluid ml-2" width="40" src="<?= $author_image; ?>" />
                        <?php else : ?>
                            <img style="max-width: 100%; height: auto;" class="rounded-circle d-inline img-fluid ml-2" width="40" src="/uploads/avatar.jpg" />
                        <?php endif; ?>
                        <span class="border border-right-0">📝 By <?= $author_name ?> at 📅 <?= $row['post_created']; ?></span>
                    </div>
                    <?php if (!empty($image)) : ?>
                        <img style="width: 40vw;max-width: 100%; height: auto;" class="card-img-top my-0 mx-auto img-fluid" width="100%" src="<?= $image; ?>" />
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="text-center card-title"><?= $title; ?></h2>
                        <div class="card-text"><?= $excerpt; ?></div>
                        <a class="btn btn-primary btn-block mt-5" href="post.php?post_id=<?= $row['post_id']; ?>">Read more</a>

                    </div>
                    <?php if (validate_user() && $row['post_author'] == $_SESSION['user_id']) : ?>
                        <div class="mt-4 d-flex justify-content-between actions border-top p-2">
                            <a class="btn btn-warning" href="edit_post.php?post_id=<?= $row['post_id']; ?>">
                                <img src="css/img/pencil.png"> Edit
                            </a>
                            <a class="btn btn-danger" href="delete_post.php?post_id=<?= $row['post_id']; ?>">
                                <img src="css/img/rubbish.png"> Delete
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>

        </div>
    <?php endif; ?>
</div>

<?php
require 'templates/footer.php';
