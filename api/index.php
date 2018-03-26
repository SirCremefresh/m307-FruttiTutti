<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

require './util/Database.php';

require './app/model/Fruit.php';
require './app/model/ParchOrder.php';
require './app/model/QuantityCategory.php';


require './app/controller/SystemController.php';
require './app/controller/FruitController.php';
require './app/controller/ParchOrderController.php';
require './app/controller/QuantityCategoryController.php';

$app->run();
