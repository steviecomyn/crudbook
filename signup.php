<?php
    // include the header.
    include 'includes/php/header.php';

    //=================================================================================================
    // VARIABLES
    //=================================================================================================

    $error = array();

    //=================================================================================================
    // LOGIC
    //=================================================================================================

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {   
            // Create new User object.
            $new_user = new User;
            
            // Check email is set.
            if (isset($_POST['user_email']) AND !empty(trim($_POST['user_email'])))
                {
                    // Check if eMail is already taken.
                    if (!$new_user->checkEmailAvailability($user_email))
                        {
                            $errors[] = array(
                                            "message" => "eMail already taken.",
                                            "style" => "error"
                                            );
                        }
                }
            else
                {
                    $errors[] = array(
                        "message" => "Please enter your email address.",
                        "style" => "warning"
                        );
                }

            // Check if firstname is set.
            if (!isset($_POST['user_first_name']) OR empty(trim($_POST['user_first_name'])))
                {
                    $errors[] = array(
                        "message" => "Please enter your first name.",
                        "style" => "warning"
                        );
                }
            
            // Check if lastname is set.
            if (!isset($_POST['user_last_name']) OR empty(trim($_POST['user_last_name'])))
                {
                    $errors[] = array(
                        "message" => "Please enter your last name.",
                        "style" => "warning"
                        );
                }

            // Check password & password_confirm are set.
            if (isset($_POST['user_password']) AND !empty(trim($_POST['user_password'])) AND isset($_POST['user_password_confirm']) AND !empty(trim($_POST['user_password_confirm'])))
                {
                    // Check if the passwords match.
                    if(!$new_user->checkPassword($_POST['user_password'],$_POST['user_password_confirm']))
                        {
                            $errors[] = array(
                                "message" => "Password's do not match.",
                                "style" => "error"
                                );
                        }
                }
            else
                {
                    $errors[] = array(
                        "message" => "Please enter a password.",
                        "style" => "warning"
                        );
                }
            
            // If there's no errors, try to create an account.
            if(empty($errors))
                {
                    // Filter $_POST variables.
                    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
                    $user_first_name = filter_input(INPUT_POST, 'user_first_name', FILTER_SANITIZE_STRING);
                    $user_last_name = filter_input(INPUT_POST, 'user_last_name', FILTER_SANITIZE_STRING);
                    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_SPECIAL_CHARS);
                    
                    if ($new_user->createUserAccount($user_first_name,$user_last_name,$user_email,$user_password))
                        {
                            header("location: login.php");
                        }
                    else
                        {
                            $errors[] = array(
                                "message" => "There was a problem creating your account.",
                                "style" => "error"
                                );
                        }
                }

        }
?>

<div class="container">

    <h1 class="display-4">Sign Up</h1>
    <p class="text-muted">Create an account.</p>

    <?php

        // Check if any errors are set, if so, display them.
        if ($errors)
        {
            foreach($errors as $error)
            {
                //echo "error - ".$error;
                echo displayAlert($error['message'], $error['style']);
            }  
        }

    ?>

    <form action="" method="POST" class="needs-validation" novalidate>

        <div class="form-row mb-3">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="user_first_name">First Name</label>
                    <input type="text" class="form-control" name="user_first_name" id="user_first_name" placeholder="First name" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="user_last_name">Last Name</label>
                    <input type="text" class="form-control" name="user_last_name" id="user_last_name" placeholder="Last name" required>
                </div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" class="form-control mb-3" name="user_email" id="user_email" placeholder="Email" required>
                </div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
            <div class="form-group">
                    <label for="user_password_confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="user_password_confirm" id="user_password_confirm" placeholder="Confirm password" required>
                </div>
            </div>
        </div>

        <div class="col-12 offset-md-9 col-md-3 p-0">
            <button type="submit" class="btn btn-block btn-secondary">Sign Up</button>
        </div>

    </form>

</div>

<?php
    // include the footer.
    include 'includes/php/footer.php';
?>