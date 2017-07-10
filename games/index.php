<?php
use Slim\Http\Request;
use Slim\Http\Response;

require 'vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: volkeee
 * Date: 7/4/17
 * Time: 8:33 PM
 */
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$app->get("/",  function (Request $req,  Response $res, $args = []) {
    echo "Welcome! This web page is a server for GamesLibrary android app. In order to use it you have to install corresponding app to your phone";
});
$app->run();