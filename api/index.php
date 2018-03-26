<?php
require 'vendor/autoload.php';


$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
	return $response;
});

$app->add(function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
		->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
		->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require './util/Database.php';

require './app/model/Fruit.php';
require './app/model/ParchOrder.php';
require './app/model/QuantityCategory.php';


require './app/controller/SystemController.php';
require './app/controller/FruitController.php';
require './app/controller/ParchOrderController.php';
require './app/controller/QuantityCategoryController.php';

$app->run();
