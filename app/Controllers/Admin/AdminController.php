<?php

namespace App\Controllers\Admin;

use \App\Core\BaseController;

class AdminController extends BaseController {
    public function index() {
        $this->renderAdmin("admin/home");
    }
}
