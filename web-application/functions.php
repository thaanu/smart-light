<?php 

    function isAuth() 
    {
        $s = getSession();
        if ( ! empty($s) ) {
            return (array_key_exists('session', $s) ? true : false);
        }
        return false;
    }

    function setFlashMessage( $msg, $status )
    {
        setSession('msg', [
            'msg' => $msg,
            'status' => $status
        ]);
    }

    function flashMessage()
    {
        $s = getSession();
        if ( ! empty($s) && array_key_exists('msg', $s) ) {
            showAlert($s['msg']['msg'], ($s['msg']['status'] ?? 'info'));
            deleteSession('msg');
        }
    }

    function showAlert( $msg, $status, $closable = true )
    {
        echo '<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert"" role="alert">';
        echo $msg;
        if ( $closable ) {
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        }
        echo '</div>';
    }

    function redirectTo( $to )
    {
        header("Location: $to");
        exit;
    }

    function setSession( $key, $params )
    {
        $_SESSION['vciot'][$key] = $params;
    }

    function getSession()
    {
        if ( isset($_SESSION['vciot']) ) {
            return $_SESSION['vciot'];
        }
        return false;
    }

    function deleteSession( $key )
    {
        if ( isset($_SESSION['vciot'][$key]) ) {
            unset($_SESSION['vciot'][$key]);
        }
    }

    function getIcon( $type )
    {
        switch ( strtolower($type) ) {
            case 'light':
                echo '<img src="assets/bulb.svg" style="width: 32px;" />';
                break;
            case 'fan':
                echo '<img src="assets/fan.svg" style="width: 32px;" />';
                break;
            default:
                echo '';
        }
    }