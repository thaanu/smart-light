<?php 

    include __DIR__ . '/bootstrap.php';

    try {

        $status = 200;
        $text = 'OK';

        // todo: authentication

        $action = $_GET['action'];

        if ( $action == 'get-devices' ) {
            $response['devices'] = $dbConn->selectAllDevices()->getResults();
        }

        else {
            throw new Exception('Invalid action', 400);
        }

    }
    catch ( Exception $e ) {
        $status = $e->getCode();
        $text = $e->getMessage();
    }
    finally {
        header("HTTP/1.0 $status $text");
        header('Content-Type: application/json');
        $response['status'] = $status;
        $response['text'] = $text;
        echo json_encode($response);
        exit; // Do not execute anything further
    }