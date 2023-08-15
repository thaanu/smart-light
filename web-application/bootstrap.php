<?php 

    // Load application configuration
    $appConfig = include __DIR__ . '/config.php';

    // Error Display
    if ( $appConfig['mode'] == 'dev' ) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    // Include dependencies
    include __DIR__ . '/functions.php';
    include __DIR__ . '/database.php';

    // Initialize Session
    session_start();

    // Initialize Database Connection
    $dbConn = new Database($appConfig['database']);