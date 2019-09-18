<?php

function getStyles()
    {
        // Twitter Bootstrap CSS
        
        //$bs_local = '<link rel="stylesheet" href="includes/css/bootstrap-4.3.1-dist/css/bootstrap.min.css">';
        $bs_remote = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">';
        
        // Custom CSS
        $custom_local = '<link rel="stylesheet" href="includes/css/style.css">';

        // $fa_external = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';

        // $la_external = '<link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">';

        // $jam_external = '<link rel="stylesheet" href="https://unpkg.com/jam-icons/css/jam.min.css">';

        // $material_icons_external = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
        
        // Material Design Icons - https://dev.materialdesignicons.com/
        $mdi_external = '<link href="https://cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css" rel="stylesheet">';

        $mdi_helper_css = '<style>.alert.mdi::before,.breadcrumb .mdi::before,.btn.mdi::before,.card-link.mdi::before,.card-subtitle.mdi::before,.card-title.mdi::before,.dropdown-item.mdi::before,.list-group-item.mdi::before,.nav-link.mdi::before{font-size:1.25em;line-height:initial;position:relative;top:.09rem}.alert.mdi::before,.breadcrumb .mdi:not(:empty)::before,.btn.mdi:not(:empty)::before,.card-link.mdi:not(:empty)::before,.card-subtitle.mdi:not(:empty)::before,.card-title.mdi:not(:empty)::before,.dropdown-item.mdi:not(:empty)::before,.nav-link.mdi:not(:empty)::before{margin-right:.25rem}.list-group-item.mdi:not(:empty)::before{margin-right:.5rem}.dropdown-item.mdi:not(:empty)::before{margin-left:-.75rem}.alert.mdi::before,.list-group-item.mdi:not(:empty)::before{margin-left:-.5rem}.modal-title.mdi::before{font-size:1.5em;line-height:.5;position:relative;top:.26rem;margin-right:.5rem}</style>';

        //$old_mdi_helper_css = '<style>.btn .mdi::before{position:relative;top:4px}.btn-xs .mdi::before{font-size:18px;top:3px}.btn-sm .mdi::before{font-size:18px;top:3px}.dropdown-menu .mdi{width:18px}.dropdown-menu .mdi::before{position:relative;top:4px;left:-8px}.nav .mdi::before{position:relative;top:4px}.navbar .navbar-toggle .mdi::before{position:relative;top:4px;color:#fff}.breadcrumb .mdi::before{position:relative;top:4px}.breadcrumb a:hover{text-decoration:none}.breadcrumb a:hover span{text-decoration:underline}.alert .mdi::before{position:relative;top:4px;margin-right:2px}.input-group-addon .mdi::before{position:relative;top:3px}.navbar-brand .mdi::before{position:relative;top:2px;margin-right:2px}.list-group-item .mdi::before{position:relative;top:3px;left:-3px}</style>';


        // Print to page
        echo $bs_remote.$custom_local.$mdi_external.$mdi_helper_css;
    };

?>