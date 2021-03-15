<?php

// Extends controller.php and loads dependencies from dashboard-model.php

require_once('controller.php');
require_once('./model/dashboard-model.php');

class Dashboard extends Controller
{

  public $active = 'dashboard'; // For highlighting the active link
  private $dashboardModel;

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) header("Location: index.php");
    $this->dashboardModel = new DashboardModel();
  }

  public function getPages(): array {
    return $this->dashboardModel->fetchPages();
  }

  public function getRecentUsers(): array {
    return $this->dashboardModel->fetchRecentUsers();
  }

}

?>
