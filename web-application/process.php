<?php 

    include __DIR__ . '/bootstrap.php';

    if ( array_key_exists('action', $_GET) ) {

        $get = $_GET;

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $post = $_POST;
        }

        // Login
        if ( $get['action'] == 'login' ) {

            if ( $post['username'] == 'ahmed.shan' && $post['password'] == '1235') {

                setSession('session', [
                    'username' => $post['username']
                ]);

                // Create a session
                setFlashMessage("Welcome " . $post['username'], "success");
                redirectTo( 'index.php' );

            } else {
                setFlashMessage('Invalid Login', 'danger' );
                redirectTo( 'index.php' );
            }

        }

        // Add New Device
        else if ( $get['action'] == 'newdevice' ) {

            try {
                $deviceName = $post['device_name'];
                $deviceLocation = $post['device_location'];
                $deviceIp = $post['device_ip'];
                $deviceType = $post['device_type'];
                $deviceUid = time();
                $deviceHash = md5($deviceUid);
                $dbConn->newDevice($deviceName,$deviceIp,$deviceHash,$deviceLocation,$deviceUid,$deviceType);
                setFlashMessage('New device added', 'success');
            }
            catch( Exception $e ) {
                setFlashMessage($e->getMessage(), 'danger');
            }

            redirectTo('index.php');

        }

        // Logout
        else if ( $get['action'] == 'logout' ) {
            setFlashMessage('You have logged out', 'info');
            deleteSession('session');
            redirectTo('index.php');
        }

        // Toggle switch
        else if ( $get['action'] == 'toggle-switch' ) {

            $uid = $get['uid'];
            $hash = $get['hash'];

            $device = $dbConn->getDevice( $uid, $hash )->getResults();

            if ( empty($device) ) {
                throw new Exception('Unable to find device', 404);
            }

            $device = $device[0];
            $deviceStatus = $device['device_status'];

            if ( $deviceStatus == 'on' ) {
                $dbConn->changeDeviceStatus( $uid, 'off' );
            } else {
                $dbConn->changeDeviceStatus( $uid, 'on' );
            }

            echo 'OK';

        }

        // For everything else
        else {
            setFlashMessage('Invalid action', 'danger' );
            redirectTo( 'index.php' );
        }

    }
    // For not sending the action key
    else {
        setFlashMessage('Action undefined', 'danger' );
        redirectTo( 'index.php' );
    } 