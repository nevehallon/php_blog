<?php
require_once 'functions/config.php';

if (isset($_POST['submit'])) {
    check_token();
    require_once 'functions/process_registration.php';
}
require_once 'templates/header.php';
?>

<section class="jumbotron">
    <div class="container">
        <h1 class="jumbotron-heading text-center">Registration</h1>
        <h6 class="text-center">Everything starts somewhere</h6>
        <?php require_once 'templates/notifications.php'; ?>
        <div class="row">
            <div class="w-100 mx-auto">
                <form method="post" enctype="multipart/form-data">
                    <p>
                        <label for="fname" class="form-label">First name</label>
                        <input type="text" name="fname" class="form-control">
                    </p>
                    <p>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="text" name="email" class="form-control">
                    </p>
                    <p>
                        <label for="pw" class="form-label">Password</label>
                        <input id="pw" type="password" name="pw" class="form-control">
                    </p>
                    <p>
                        <label for="image" class="form-label">Image</label>
                        <input id="image" type="file" name="profile_image" accept="image/*" class="form-control">
                    </p>
                    <input type="hidden" name="token" value="<?= get_token(); ?>">
                    <p>
                        <input class="btn btn-primary btn-block" type="submit" name="submit" value="Sign me up">
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require_once 'templates/footer.php';
