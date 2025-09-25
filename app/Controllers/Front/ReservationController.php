<?php

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Core\Database;
use App\Models\HotelModel;

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

        try {
            if (isset($this->db)) {

                if (isset($_GET['filter_submitted']) && $_GET['filter_submitted'] == "1") {
                    $capacity = $_GET['kişisay'];
                    $priceFilter = $_GET['price-filter'] ?? null;

                    $noneSmoke = isset($_GET['none-smoke']);
                    $disabledAccess = isset($_GET['engelli-erişimi']);
                    $romanticPacket = isset($_GET['romantic-packet']);

                    if ($noneSmoke || $disabledAccess || $romanticPacket) { // ++
                        $rooms = $this->roomModel->filterWithSpecialFeatures($capacity, $priceFilter, $noneSmoke, $disabledAccess, $romanticPacket);
                    } else if (isset($capacity)) { // - -
                        if ($capacity == 2) { // Buradaki hata (==) değeriydi bu değer yerine = kullanırsak bunun anlamı aslında ya doğrudur ya doğru bu doğru olana kadar aşşağıya geçme demektir bu.Bunu yapmak istersek (=) kullanmamız lazımdır.
                            if (!empty($priceFilter)) {
                                $rooms = $this->roomModel->twopricefilter($priceFilter, $capacity);
                            } else {
                                $rooms = $this->roomModel->capacityRoom($capacity);
                            }
                        } else if ($capacity == 3) {
                            if (!empty($priceFilter)) {
                                $rooms = $this->roomModel->threepricefilter($priceFilter, $capacity);
                            } else {
                                $rooms = $this->roomModel->capacityRoom($capacity);
                            }
                        }
                    } else {
                        $rooms = $this->roomModel->getAllRoom();
                    }
                } else {
                    $rooms = $this->roomModel->getAllRoom();
                }
            }
        } catch (\Throwable $th) {
            $rooms = $this->roomModel->getAllRoom();
        }

        $this->render('/front/reservation', [
            'rooms' => $rooms
        ]);

        // Her yere render() yazmaktansa burada olduğu gibi bir tane liste değeri oluşturup içinide boş yaparsak sadece bu değeri çağırıp yazarız en sona da bu değerin aslında ne olduğunu yani bu değeri =>

        // $this->render('/front/reservation', [
        //    'rooms' => $rooms
        // ]);

    }

    public function filterdeleted()
    {

        $data = [];

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data['action'] === 'sil') {
            // Buradaki fonksiyon senin yazdığın bir işlem olabilir
            $rooms = $this->roomModel->getAllRoom();

            $this->render('/front/reservation', [
                'rooms' => $rooms
            ]);

            echo json_encode(['success' => true, 'message' => 'Silme işlemi tamamlandı.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Geçersiz işlem.']);
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
