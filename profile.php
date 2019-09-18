<?php
    // include the header.
    include 'includes/php/header.php';
?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="display-4 text-center"><?=$_SESSION['user_first_name']." ".$_SESSION['user_last_name'];?></h3>
                    <p class="lead text-center"><?=$_SESSION['user_email'];?></p>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary mx-1">Edit Profile</button>
                            <a class="btn btn-outline-secondary mx-1" href="logout.php" role="button">Log Out</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // include the footer.
    include 'includes/php/footer.php';
?>