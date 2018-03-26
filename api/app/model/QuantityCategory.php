<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 08:54
 */

class QuantityCategory
{
    public $quantityCategoryId;
    public $description;
    public $additionalDays;
    public $totalDays;

    /**
     * QuantityCategory constructor.
     * @param $quantityCategoryId
     * @param $description
     * @param $additionalDays
     * @param $totalDays
     */
    public function __construct($quantityCategoryId, $description, $additionalDays, $totalDays)
    {
        $this->quantityCategoryId = $quantityCategoryId;
        $this->description = $description;
        $this->additionalDays = $additionalDays;
        $this->totalDays = $totalDays;
    }

    public static function getAll()
    {
        $quantityCategories = [];

        $conn = Database::getDbConn();
        $statement = $conn->prepare('SELECT * FROM quantityCategory');
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $resultItem) {
            array_push(
                $quantityCategories,
                new QuantityCategory(
                    $resultItem['quantityCategoryId'],
                    $resultItem['description'],
                    $resultItem['additionalDays'],
                    $resultItem['totalDays']

                )
            );
        }
        return $quantityCategories;
    }

}