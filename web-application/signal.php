<?php 

    include __DIR__ . '/bootstrap.php';

    try {

        $status = 200;
        $text = 'OK';

        if ( ! isset($_GET['uid']) ) { throw new Exception('UID is required', 400); }
        if ( ! isset($_GET['hash']) ) { throw new Exception('Hash is required', 400); }

        $uid = $_GET['uid'];
        $hash = $_GET['hash'];

        $device = $dbConn->getDevice( $uid, $hash )->getResults();

        if ( empty($device) ) {
            throw new Exception('Unable to find device', 404);
        }

        $device = $device[0];

        file_put_contents('signal.log', print_r($device, true));

        $response['data']['uid'] = $uid;
        $response['data']['hash'] = $hash;

        if ( $device['device_status'] == 'on' ) {
            echo "on";
            // $response['data']['status'] = "off";
        } else {
            echo "off";
            // $response['data']['status'] = "on";
        }

        exit;

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