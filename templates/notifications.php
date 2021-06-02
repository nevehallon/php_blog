<?php if (isset($messages)) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($messages as $msg) : ?>
            <p><?= $msg; ?></p>
        <?php endforeach; ?>
    </div>
<?php elseif (isset($success)) : ?>
    <p class="alert alert-success text-center"><?= $success; ?></p>
<?php endif; ?>