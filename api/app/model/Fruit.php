<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 08:54
 */

class Fruit
{
	public $fruitId;
	public $name;

	public function __construct($fruitId, $name)
	{
		$this->fruitId = $fruitId;
		$this->name = $name;
	}


	public static function getAll()
	{
		$fruits = [];

		$conn = Database::getDbConn();
		$statement = $conn->prepare('SELECT * FROM fruit');
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $resultItem) {
			array_push(
				$fruits,
				new Fruit(
					$resultItem['fruitId'],
					$resultItem['name']
				)
			);
		}
		return $fruits;
	}

	public static function get($id): ?Fruit
	{
		print_r("begin");
		$conn = Database::getDbConn();
		$statement = $conn->prepare('SELECT * FROM fruit WHERE fruitId = :id');
		$statement->bindParam('id', $id, PDO::PARAM_INT);
		$statement->execute();
		print_r("begin2");

		$result = $statement->fetchAll();
		print_r($result);

		if (count($result) === 0) {
			return null;
		}
		print_r("end");

		return new Fruit(
			$result[0]['fruitId'],
			$result[0]['name']
		);
	}
}