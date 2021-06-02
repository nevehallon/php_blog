<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="js/scripts.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title><?= $title ?? 'My blog'; ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarToggler">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-5">
                        <li class="nav-item">
                            <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] == "/hp.php" ? "active" : "" ?>" aria-current="page" href="hp.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] == "/about.php" ? "active" : "" ?>" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] == "/blog.php" ? "active" : "" ?>" href="blog.php">Blog</a>
                        </li>
                        <?php if (!validate_user()) : ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] == "/registration.php" ? "active" : "" ?>" href="registration.php">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] == "/login.php" ? "active" : "" ?>" href="login.php">Login</a>
                            </li>

                        <?php endif; ?>
                    </ul>
                    <?php if (validate_user()) : ?>
                        <p class=" my-2 my-md-0">Hello, <?= ucwords(strtolower($_SESSION['user_name'])); ?>
                            <?php if (!empty($_SESSION['user_image'])) : ?>
                                <img style="max-width: 100%; height: auto;" class="profile-image" src="<?= $_SESSION['user_image']; ?>">
                            <?php endif; ?>
                            <a class="p-1 ml-4 btn btn-sm btn-secondary" href="logout.php">Logout</a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>