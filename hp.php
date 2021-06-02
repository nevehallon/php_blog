<?php
require_once 'functions/config.php';
require_once 'templates/header.php';
?>
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Welcome to the blog!</h1>
    <p class="lead text-muted">Use this space to connect with your readers and potential customers in a way that’s current and interesting. Think of it as an ongoing conversation where you can share updates about business, trends, news, and more. </p>
    <?php if (!validate_user()) : ?>
      <a class="btn btn-success btn-block w-50 mx-auto" href="registration.php">Join the fun!</a>
    <?php endif; ?>
  </div>
</section>
<?php require_once 'templates/footer.php'; ?>