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
                    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
                }
            else
                {
                    $errors[] = array(
                        "message" => "Please enter your email address.",
                        "style" => "warning"
                        );
                }

            // Check password & password_confirm are set.
            if (isset($_POST['user_password']) AND !empty(trim($_POST['user_password'])))
                {
                    $user_password = $_POST['user_password'];
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
                    $user = $new_user->loginUser($user_email,$user_password);
                    
                    if($user)
                        {
                            // Store email in session variable.
                            $_SESSION['user_email'] = $user['user_email'];
                            $_SESSION['user_first_name'] = $user['user_first_name'];
                            $_SESSION['user_last_name'] = $user['user_last_name'];
                            header("location: index.php");
                        }
                    else
                        {
                            $errors[] = array(
                                "message" => "There was a problem logging in.",
                                "style" => "error"
                                );
                        }
                }

        }
?>

<div class="container">

    <h1 class="display-4">Sign in</h1>
    <p class="text-muted">Sign in to continue.</p>

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

    <form action="" method="POST">

        <div class="form-row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" class="form-control mb-3" name="user_email" id="user_email" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password">
                </div>
            </div>
        </div>

        <div class="col-12 offset-md-9 col-md-3 p-0">
            <button type="submit" class="btn btn-block btn-secondary">Sign In</button>
        </div>
    </form>

</div>  

<?php
    // include the footer.
    include 'includes/php/footer.php';
?>