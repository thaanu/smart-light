<?php 
    include __DIR__ . '/bootstrap.php';

    $status     = 200;
    $text       = '';
    $response   = [];

    try {

        $post = json_decode(file_get_contents("php://input"), true);

        if ( ! isset($post['uid']) ) { throw new Exception('UID is required', 400); }
        if ( ! isset($post['hash']) ) { throw new Exception('Hash is required', 400); }

        $uid = $post['uid'];
        $hash = $post['hash'];

        file_put_contents('post.log', print_r($post, true));

        $device = $dbConn->getDevice( $uid, $hash )->getResults();

        if ( empty($device) ) {
            throw new Exception('Unable to find device', 404);
        }

        $device = $device[0];

        if ( $device['device_status'] == 'on' ) {
            $dbConn->changeDeviceStatus( $uid, 'off' );
        } else {
            $dbConn->changeDeviceStatus( $uid, 'on' );
        }

    }
    catch ( Exception $e ) {
        $response['text'] = $e->getMessage();
    }
    finally {
        header("HTTP/1.0 $status $text");
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Do not execute anything further
    }