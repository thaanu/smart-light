<?php 
    include __DIR__ . '/bootstrap.php';

    if ( ! isAuth() ) {
        include __DIR__ . '/inc/login.php';
    }
    else {
        include __DIR__ . '/inc/devices.php';
    }