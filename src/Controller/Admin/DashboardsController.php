<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DashboardsController extends AppController
{

    public function index()
    {
        $this->set("title_for_layout", "Dashboard");
    }
}
