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

    public static function getNotDone() {
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

}