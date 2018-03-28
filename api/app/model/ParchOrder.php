<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 08:55
 */

class ParchOrder
{
	public $parchOrderId;
	public $forename;
	public $lastname;
	public $email;
	public $phone;
	public $orderDate;
	public $isDone;
	public $fruit_fk;
	public $quantityCategory_fk;

	/**
	 * ParchOrder constructor.
	 * @param $parchOrderId
	 * @param $forename
	 * @param $lastname
	 * @param $email
	 * @param $phone
	 * @param $orderDate
	 * @param $isDone
	 * @param $fruit_fk
	 * @param $quantityCategory_fk
	 */
	public function __construct($parchOrderId, $forename, $lastname, $email, $phone, $orderDate, $isDone, $fruit_fk, $quantityCategory_fk)
	{
		$this->parchOrderId = $parchOrderId;
		$this->forename = $forename;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->phone = $phone;
		$this->orderDate = $orderDate;
		$this->isDone = $isDone;
		$this->fruit_fk = $fruit_fk;
		$this->quantityCategory_fk = $quantityCategory_fk;
	}

	public static function fromArray($arr): ParchOrder
	{
		return new ParchOrder(
			$arr['parchOrderId'] ?? 0,
			$arr['forename'] ?? '',
			$arr['lastname'] ?? '',
			$arr['email'] ?? '',
			$arr['phone'] ?? '',
			$arr['orderDate'] ?? date("Y-m-d H:i:s"),
			$arr['isDone'] ?? 0,
			$arr['fruit_fk'] ?? 0,
			$arr['quantityCategory_fk'] ?? 0
		);
	}

	public static function getNotDone()
	{
		$parchOrders = [];

		$conn = Database::getDbConn();
		$statement = $conn->prepare('SELECT * FROM parchOrder WHERE isDone = 0');
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $resultItem) {
			array_push(
				$parchOrders,
				new ParchOrder(
					$resultItem['parchOrderId'],
					$resultItem['forename'],
					$resultItem['lastname'],
					$resultItem['email'],
					$resultItem['phone'],
					$resultItem['orderDate'],
					$resultItem['isDone'],
					$resultItem['fruit_fk'],
					$resultItem['quantityCategory_fk']
				)
			);
		}
		return $parchOrders;
	}

	public static function get($id): ?ParchOrder
	{
		$conn = Database::getDbConn();
		$statement = $conn->prepare('SELECT * FROM parchOrder WHERE parchOrderId = :id');
		$statement->bindParam('id', $id, PDO::PARAM_INT);
		$statement->execute();
		$result = $statement->fetchAll();
		if (sizeof($result) === 0) {
			return null;
		}
		return new ParchOrder(
			$result[0]['parchOrderId'],
			$result[0]['forename'],
			$result[0]['lastname'],
			$result[0]['email'],
			$result[0]['phone'],
			$result[0]['orderDate'],
			$result[0]['isDone'],
			$result[0]['fruit_fk'],
			$result[0]['quantityCategory_fk']
		);
	}

	public static function create($parchOrder)
	{
		$conn = Database::getDbConn();
		$statement = null;

		$statement = $conn->prepare('
INSERT INTO parchOrder 
(forename, lastname, email, phone, isDone, orderDate,fruit_fk, quantityCategory_fk) VALUE 
(:forename, :lastname, :email, :phone, :isDone, :orderDate,:fruit_fk, :quantityCategory_fk)
');

		$statement->bindParam('forename', $parchOrder->forename, PDO::PARAM_STR);
		$statement->bindParam('lastname', $parchOrder->lastname, PDO::PARAM_STR);
		$statement->bindParam('email', $parchOrder->email, PDO::PARAM_STR);
		$statement->bindParam('phone', $parchOrder->phone, PDO::PARAM_STR);
		$statement->bindParam('isDone', $parchOrder->isDone, PDO::PARAM_BOOL);
		$statement->bindParam('orderDate', $parchOrder->orderDate, PDO::PARAM_STR);
		$statement->bindParam('fruit_fk', $parchOrder->fruit_fk, PDO::PARAM_INT);
		$statement->bindParam('quantityCategory_fk', $parchOrder->quantityCategory_fk, PDO::PARAM_INT);

		$statement->execute();
		$id = $conn->lastInsertId();


		return ParchOrder::get($id);
	}

	public static function update($id, $parchOrder)
	{
		$conn = Database::getDbConn();
		$statement = null;

		$statement = $conn->prepare('UPDATE parchOrder SET forename = :forename, lastname = :lastname, email = :email, phone = :phone, isDone = :isDone, orderDate = :orderDate, fruit_fk = :fruit_fk, quantityCategory_fk = :quantityCategory_fk WHERE parchOrderId = :parchOrderId');

		$statement->bindParam('parchOrderId', $id, PDO::PARAM_INT);
		$statement->bindParam('forename', $parchOrder->forename, PDO::PARAM_STR);
		$statement->bindParam('lastname', $parchOrder->lastname, PDO::PARAM_STR);
		$statement->bindParam('email', $parchOrder->email, PDO::PARAM_STR);
		$statement->bindParam('phone', $parchOrder->phone, PDO::PARAM_STR);
		$statement->bindParam('isDone', $parchOrder->isDone, PDO::PARAM_BOOL);
		$statement->bindParam('orderDate', $parchOrder->orderDate, PDO::PARAM_STR);
		$statement->bindParam('fruit_fk', $parchOrder->fruit_fk, PDO::PARAM_INT);
		$statement->bindParam('quantityCategory_fk', $parchOrder->quantityCategory_fk, PDO::PARAM_INT);

		$statement->execute();

		return ParchOrder::get($id);
	}

}