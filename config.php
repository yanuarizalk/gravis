<?php
    if (!isset($nodirect)) die('nope');

    $cfg['db'] = array(
        'host' => 'localhost',
        'port' => '3306',
        'name' => 'gravise',
        'user' => 'gravise',
        'pass' => 'freeyourmind'
    );

    $cfg['auth'] = array(
        'mail' => 'dummy@gravis-design.com',
        'pass' => 'dummy'
    );

    $cfg['path'] = array(
        'js' => 'assets/js/',
        'css' => 'assets/css/',
        'img' => 'assets/img/'
    );

?>