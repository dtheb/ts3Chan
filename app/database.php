<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$cfg = Tools::getConfig('database');
$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => $cfg['driver'],
    'host'      => $cfg['host'],
    'database'  => $cfg['database'],
    'username'  => $cfg['username'],
    'password'  => $cfg['password'],
    'charset'   => $cfg['charset'],
    'collation' => $cfg['collation'],
    'prefix'    => $cfg['prefix']
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
