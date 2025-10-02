<?php

namespace App\Models;

use App\Core\Database;
use Exception;
use PDO;

class AdminModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function AllRoomGet()
    {
        $result = $this->db->prepare("SELECT * FROM `rooms-table`");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRoomCount()
    {

        $result = $this->db->prepare("SELECT COUNT('room-name') FROM `rooms-table` ");

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotalPrice() {
        $result = $this->db->prepare("
        SELECT 
	        COUNT(DISTINCT di.room_id) AS reservation
            ,((COUNT(DISTINCT di.room_id)) * 100) / COUNT('rt.room-name') AS percenttotal
            ,COUNT('rt.room-name') AS totalroom
            ,SUM(rt.price) AS sumtotal
        FROM `date-information` di  INNER JOIN `rooms-table` rt ON di.room_id = rt.id");

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function percentTotal() {

    }

}
