<?php
    $nodirect = true;
    include 'init.php';

    header('Content-Type: application/json');

    /*if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(405);
        die(json_encode(array(
            'status' => 'error',
            'desc' => 'Not Allowed Method'
        )));
    }*/

    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'login') && (isset($_POST['email'], $_POST['pass']))) {
            if (($_POST['email'] == $cfg['auth']['mail']) && ($_POST['pass'] == $cfg['auth']['pass'])) {
                $_SESSION['loggedin'] = true;
                send(array(
                    'status' => 'success'
                ));
            } else {
                send(array(
                    'status' => 'wrong'
                ));
            }
        } elseif ($_GET['act'] == 'logout') {
            unset($_SESSION['loggedin']);
            header('location: index.php');
        } elseif (($_GET['act'] == 'add') && (isset($_GET['data']))) {
            if ($_SESSION['loggedin'] == false) {
                send(array(
                    'status' => 'error',
                    'desc' => 'Not Authorized'
                ));
            }

            if ($_GET['data'] == 'member') {
                $db['query'] = $db['con'] -> prepare('INSERT INTO members VALUES(null, :name_full, :name_call, :role, :birth_place, :birth_date, :religion, :education, :start_date, :address_ktp, :address_now, :no_hp, :email, :social_facebook, :social_twitter, :social_google, :social_linkedin)');
                if ($db['query'] -> execute(array(
                    ':name_full' => $_POST['name_full'],
                    ':name_call' => $_POST['name_call'],
                    ':role' => $_POST['role'],
                    ':birth_place' => $_POST['birth_place'],
                    ':birth_date' => $_POST['birth_date'],
                    ':religion' => $_POST['religion'],
                    ':education' => $_POST['education'],
                    ':start_date' => $_POST['start_date'],
                    ':address_ktp' => $_POST['address_ktp'],
                    ':address_now' => $_POST['address_now'],
                    ':no_hp' => $_POST['no_hp'],
                    ':email' => $_POST['email'],
                    ':social_facebook' => $_POST['social_facebook'],
                    ':social_twitter' => $_POST['social_twitter'],
                    ':social_google' => $_POST['social_google'],
                    ':social_linkedin' => $_POST['social_linkedin']
                ))) {
                    foreach ($_FILES as $pp) {
                        @move_uploaded_file($pp['tmp_name'], getcwd().'/'.$cfg['path']['img'].'profile/'.$db['con'] -> lastInsertId().'.png');
                    }
                    send(array(
                        'status' => 'success'
                    ));
                } else {
                    send(array(
                        'status' => 'error',
                        'desc' => 'Query Error'
                    ));
                }
            }
        } elseif (($_GET['act'] == 'edit') && (isset($_GET['data'])))  {
            if ($_SESSION['loggedin'] == false) {
                send(array(
                    'status' => 'error',
                    'desc' => 'Not Authorized'
                ));
            }
            if ($_GET['data'] == 'member') {
                $db['query'] = $db['con'] -> prepare('UPDATE members SET name_full=:name_full, name_call=:name_call, role=:role, birth_place=:birth_place, birth_date=:birth_date, religion=:religion, education=:education, start_date=:start_date, address_ktp=:address_ktp, address_now=:address_now, no_hp=:no_hp, email=:email, social_facebook=:social_facebook, social_twitter=:social_twitter, social_google=:social_google, social_linkedin=:social_linkedin WHERE id=:id');
                if ($db['query'] -> execute(array(
                    ':name_full' => $_POST['name_full'],
                    ':name_call' => $_POST['name_call'],
                    ':role' => $_POST['role'],
                    ':birth_place' => $_POST['birth_place'],
                    ':birth_date' => $_POST['birth_date'],
                    ':religion' => $_POST['religion'],
                    ':education' => $_POST['education'],
                    ':start_date' => $_POST['start_date'],
                    ':address_ktp' => $_POST['address_ktp'],
                    ':address_now' => $_POST['address_now'],
                    ':no_hp' => $_POST['no_hp'],
                    ':email' => $_POST['email'],
                    ':social_facebook' => $_POST['social_facebook'],
                    ':social_twitter' => $_POST['social_twitter'],
                    ':social_google' => $_POST['social_google'],
                    ':social_linkedin' => $_POST['social_linkedin'],
                    ':id' => $_POST['id']
                ))) {
                    foreach ($_FILES as $pp) {
                        @move_uploaded_file($pp['tmp_name'], getcwd().'/'.$cfg['path']['img'].'profile/'.$_POST['id'].'.png');
                    }
                    send(array(
                        'status' => 'success'
                    ));
                } else {
                    send(array(
                        'status' => 'error',
                        'desc' => 'Query Error'
                    ));
                }
            }
        } elseif (($_GET['act'] == 'del') && (isset($_GET['data'])))  {
            if ($_SESSION['loggedin'] == false) {
                send(array(
                    'status' => 'error',
                    'desc' => 'Not Authorized'
                ));
            }
            if ($_GET['data'] == 'member') {
                $db['query'] = $db['con'] -> prepare('DELETE FROM members WHERE id=:id');
                if ($db['query'] -> execute(array(
                    ':id' => $_POST['id']
                ))) {
                    send(array(
                        'status' => 'success'
                    ));
                } else {
                    send(array(
                        'status' => 'error',
                        'desc' => 'Query Error'
                    ));
                }
            }
        } else {
            http_response_code(400);
            send(array(
                'status' => 'error',
                'desc' => 'Invalid Request'
            ));
        }
    } else {
        http_response_code(400);
        send(array(
            'status' => 'error',
            'desc' => 'Invalid Request'
        ));
    }

    
?>