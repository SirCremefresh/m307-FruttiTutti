<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 20.03.18
 * Time: 13:43
 */


use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/system/ping', function (Request $request, Response $response, array $args) {
	$response->getBody()->write("pong");
	return $response;
});
