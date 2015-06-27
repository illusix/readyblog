<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

if (!in_array('phalcon', get_loaded_extensions())) die ('Phalcon extension not loaded!');

try {
    require_once __DIR__ . '/../application/bootstrap.php';
    $application = new \Application\Bootstrap();
    $application->run();
} catch (\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage(), "<br>", nl2br($e->getTraceAsString());
}
