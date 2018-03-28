<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 09:01
 */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/fruit', function (Request $request, Response $response, array $args) {
	$fruits = Fruit::getAll();
	return $response->withJson($fruits);
});
