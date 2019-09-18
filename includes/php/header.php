<?php
    // include the database connection.
    include_once 'includes/includes.php';

    // Start the session.
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=getStyles();?>
    <title><?=SITE_NAME;?></title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-custom mb-5">
            
            <a class="navbar-brand" href="index.php"><?=SITE_NAME;?></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <i class="mdi mdi-menu text-white" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?=$_SESSION['user_first_name'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" role="button">Log Out</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>

        </nav>
    </header>