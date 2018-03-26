<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 09:02
 */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/quantitycategory', function (Request $request, Response $response, array $args) {
	$quantityCategories = QuantityCategory::getAll();
	return $response->withJson($quantityCategories);
});