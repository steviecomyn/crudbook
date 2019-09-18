<?php
    // include the header.
    include 'includes/php/header.php';
?>

<div class="container">

    <h1 class="display-4"><?php echo 'Welcome'.($_SESSION['user_first_name'] ? ', '.$_SESSION['user_first_name']."!" : '!'); ?></h1>
    <p class="text-muted">This is the homepage.</p>

</div>

<?php
    // include the footer.
    include 'includes/php/footer.php';
?>