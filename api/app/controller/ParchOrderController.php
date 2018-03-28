<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 09:01
 */


use Slim\Http\Request;
use Slim\Http\Response;

function isValidParchOrder(ParchOrder $parchOrder)
{

	if (
		ValidationHelper::isEmpty($parchOrder->forename) ||
		!ValidationHelper::stringHasJustCharacters($parchOrder->forename)
	) {
		print("fail forename");
		return false;
	}

	if (
		ValidationHelper::isEmpty($parchOrder->lastname) ||
		!ValidationHelper::stringHasJustCharacters($parchOrder->lastname)
	) {
		print("fail lastname");
		return false;
	}

	if (
		ValidationHelper::isEmpty($parchOrder->email) ||
		!ValidationHelper::isEmail($parchOrder->email)
	) {
		print("fail email");
		return false;
	}

	if (
		!ValidationHelper::isEmpty($parchOrder->phone) &&
		!ValidationHelper::isPhone($parchOrder->phone)
	) {
		print("fail phone");
		return false;
	}

	if (
		ValidationHelper::isEmpty($parchOrder->orderDate)
	) {
		print("fail orderDate");
		return false;
	}

	if (
		$parchOrder->isDone != 0 && $parchOrder->isDone != 1
	) {
		print("fail isDone");
		return false;
	}

	if (
		ValidationHelper::isEmpty($parchOrder->fruit_fk) ||
		Fruit::get($parchOrder->fruit_fk) === null
	) {
		print("fail fruit_fk");
		return false;
	}

	if (
		ValidationHelper::isEmpty($parchOrder->quantityCategory_fk) ||
		QuantityCategory::get($parchOrder->quantityCategory_fk) === null
	) {
		print("fail quantityCategory_fk");
		return false;
	}

	return true;
}

$app->get('/parchorder/notdone', function (Request $request, Response $response, array $args) {
	$parchOrders = ParchOrder::getNotDone();
	return $response->withJson($parchOrders);
});

$app->post('/parchorder', function (Request $request, Response $response, array $args) {
	$body = $request->getParsedBody();

	$parchOrder = ParchOrder::fromArray($body);
	QuantityCategory::get($parchOrder->quantityCategory_fk);

	if (!isValidParchOrder($parchOrder)) {
		return $response->withJson(["created" => false]);
	}

	$saveParchOrder = ParchOrder::create($parchOrder);

	return $response->withJson($saveParchOrder);
});

$app->put('/parchorder/{id}', function (Request $request, Response $response, array $args) {
	$body = $request->getParsedBody();

	$parchOrder = ParchOrder::fromArray($body);

	QuantityCategory::get($parchOrder->quantityCategory_fk);

	if (!isValidParchOrder($parchOrder)) {
		return $response->withJson(["updated" => false]);
	}

	$saveParchOrder = ParchOrder::update($args['id'], $parchOrder);

	return $response->withJson($saveParchOrder);
});
