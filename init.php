<?php
    if (!isset($nodirect)) die('nope');
     
    session_start();

    include 'config.php';

    $db['con'] = new PDO('mysql:dbname='.$cfg['db']['name'].';host='.$cfg['db']['host'].';port='.$cfg['db']['port'], $cfg['db']['user'], $cfg['db']['pass']);

    if (!isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = false;
    }

    //login, members, detail, 404
    function page() {
        if ($_SESSION['loggedin'] == true) {
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case '':
                    case 'members': return 'members';
                    case 'detail': return 'detail';
                    default: return '404';
                }
                /*if (($_GET['page'] == 'members') || ($_GET['page'] == '')) {
                    return 'members';
                } elseif ($_GET['page'] == 'detail') {
                    return 'detail';
                } else {
                    return '404';
                }*/
            } else {
                return 'members';
            }
        } else {
            return 'login';
        }
    }

    function send($array) {
        die(json_encode($array));
    }

?>