<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 09:01
 */


use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/parchorder/notdone', function (Request $request, Response $response, array $args) {
	$parchOrders = ParchOrder::getNotDone();
	return $response->withJson($parchOrders);
});
/*
$app->post('/parchorder', function (Request $request, Response $response, array $args) {
    $parchOrders = ParchOrder::getNotDone();
    return $response->withJson($parchOrders);
});

*/