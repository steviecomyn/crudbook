<?php

// Creates a bootstrap alert based on a given message.
function displayAlert($message, $style)
    {
        $error_alert = "";
        
        switch($style)
            {
                case 'warning':
                        $error_alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong><span class="mdi mdi-alert mr-1" aria-hidden="true"></span>
                                            <span class="sr-only">WARNING</span></strong>'.$message.'
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="mdi mdi-close" aria-hidden="true"></span>
                                            <span class="sr-only">close</span>
                                            </button>
                                        </div>';
                        break;
                case 'error':
                        $error_alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><span class="mdi mdi-alert-circle mr-1" aria-hidden="true"></span>
                                            <span class="sr-only">ERROR</span></strong>'.$message.'
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="mdi mdi-close" aria-hidden="true"></span>
                                            <span class="sr-only">close</span>
                                            </button>
                                        </div>';
                        break;
            }
        
        return $error_alert;
    }

?>