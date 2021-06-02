<?php
$title = "Login";
require_once 'functions/config.php';

if (isset($_POST['login'])) {
    check_token();
    require_once 'functions/process_login.php';
}

require_once 'templates/header.php';
?>
<section class="jumbotron">
    <div class="container">
        <h1 class="jumbotron-heading text-center">Login</h1>
        <h6 class="text-center">Everything starts somewhere</h6>
        <?php require_once 'templates/notifications.php'; ?>
        <div class="row">
            <div class="w-100 mx-auto">
                <form method="post">
                    <p>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="text" name="email" class="form-control">
                    </p>
                    <p>
                        <label for="pw" class="form-label">Password</label>
                        <input id="pw" type="password" name="pw" class="form-control">
                    </p>
                    <input type="hidden" name="token" value="<?= get_token(); ?>">
                    <p><input type="submit" name="login" value="Login" class="btn btn-primary btn-block"></p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once 'templates/footer.php'; ?>