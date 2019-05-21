<?php
    if (!isset($nodirect)) die('nope');

    function view_menu() {
        //no logout? ok
        if ($_SESSION['loggedin'] == true) {
            ?>
            <li>
                <a href="index.php?page=members">Team Member</a>
            </li><!--
        --><li>
                <a href="api.php?act=logout">Log Out</a>
            </li>
            <?php
        } else {
            ?>
            <li>
                <a href="index.php?page=members">Team Member</a>
            </li>
            <?php
        }
    }

    function view_error() {
        
    }

    function view_content() {
        global $cfg;
        global $nodirect;
        global $db;
        if (page() == 'login') {
            include 'page/login.php';
        } elseif (page() == 'members') {
            include 'page/members.php';
        } elseif (page() == 'detail') {
            include 'page/detail.php';
        }
    }
?>