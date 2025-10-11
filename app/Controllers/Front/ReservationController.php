<?php

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Core\Database;
use App\Models\HotelModel;
use Exception;

class ReservationController extends BaseController
{
    private $db;
    private $roomModel;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::getInstance();
        $this->roomModel = new HotelModel();
    }

    public function index()
    {
        $rooms = [];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($this->db)) {

                if (isset($_GET['filter_submitted']) && $_GET['filter_submitted'] == "1") {
                    $capacity = $_GET['kişisay'];
                    $priceFilter = $_GET['price-filter'] ?? null;

                    $noneSmoke = isset($_GET['none-smoke']);
                    $disabledAccess = isset($_GET['engelli-erişimi']);
                    $romanticPacket = isset($_GET['romantic-packet']);

                    if ($noneSmoke || $disabledAccess || $romanticPacket) { // ++
                        $rooms = $this->roomModel->filterWithSpecialFeatures($capacity, $noneSmoke, $disabledAccess, $romanticPacket);
                    } else if (isset($capacity)) { // - -
                        if ($capacity == 2) { // Buradaki hata (==) değeriydi bu değer yerine = kullanırsak bunun anlamı aslında ya doğrudur ya doğru bu doğru olana kadar aşşağıya geçme demektir bu.Bunu yapmak istersek (=) kullanmamız lazımdır.
                            $rooms = $this->roomModel->capacityRoom($capacity);
                        } else if ($capacity == 3) {
                            $rooms = $this->roomModel->capacityRoom($capacity);
                        }
                    } else {
                        $rooms = $this->roomModel->getAllRoom();
                    }
                } else {
                    $rooms = $this->roomModel->getAllRoom();
                }
            }

            $this->render('/front/reservation', [
                'rooms' => $rooms
            ]);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->createReservation();
            return;
        }


        // Her yere render() yazmaktansa burada olduğu gibi bir tane liste değeri oluşturup içinide boş yaparsak sadece bu değeri çağırıp yazarız en sona da bu değerin aslında ne olduğunu yani bu değeri =>

        // $this->render('/front/reservation', [
        //    'rooms' => $rooms
        // ]);

    }

    public function signandoutinfo() {
        $signout = [];

        if (isset($this->db)) {
            $signout = $this->roomModel->signandlast();

            $this->render('/front/reservation', [
                'signouts' => $signout
            ]);
            return;
        }

    }

    public function createReservation()
    {

        $first = $_POST['first-sign'] ?? '';
        $last = $_POST['last-sign'] ?? '';
        $room_id = $_POST['room_id'] ?? ''; // burada ki id değeri sayesinde room-table da ki odalar ile bağlantı kurulabilecek

        $persons = $_POST['persons'] ?? [];

        if (empty($first) || empty($last)) {
            error_log("Tarih bilgileri eksik - first: $first, last: $last");
            header("Location: /reservation?error=missing_dates");
            exit;
        }

        if (empty($persons)) {
            error_log("Kişi bilgileri eksik");
            header("Location: /reservation?error=missing_persons");
            exit;
        }

        try {
            $success = false;

            foreach ($persons as $person) {
                $name = $person['name'] ?? '';
                $surname = $person['surname'] ?? '';
                $birthday = $person['birthday'] ?? '';
                $phone = $person['phone'] ?? '';
                $sex = $person['gender'] ?? '';
                if (!empty($name) && !empty($surname)) {
                    $result = $this->roomModel->postReservationİnfo($name, $room_id, $surname, $birthday, $phone, $sex, $first, $last);
                    if ($result) {
                        $success = true;
                    }
                }
            }

            if ($success) {
                header("Location: /reservation?success=1");
            } else {
                header("Location: /reservation?error=no_valid_persons");
            }
            exit;
        } catch (Exception $e) {
            error_log("Reservation error: " . $e->getMessage());
            header("Location: /reservation?error=database");
            exit;
        }
    }

    public function getRoomDetails()
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $roomName = $input['room_name'] ?? '';

        $room = $this->roomModel->getRoomByName($roomName);

        if ($room) {
            echo json_encode([
                'success' => true,
                'room' => $room
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Oda bulunamadı'
            ]);
        }
    }
}
