<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->post('/webhook', function (Request $request) {

    $audio = shell_exec('sh play.sh');
    echo $audio;
    return new Response(var_dump($request));

});

$app->run();

?>
