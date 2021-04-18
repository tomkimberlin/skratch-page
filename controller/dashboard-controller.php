<?php

// Extends controller.php and loads dependencies from dashboard-model.php

require_once('controller.php');
require_once('./model/dashboard-model.php');

class Dashboard extends Controller
{

  public string $active = 'dashboard'; // For highlighting the active link
  private DashboardModel $dashboardModel;

  public function __construct()
  {
    // When a new Dashboard object is created, check if the user is
    // logged in and if not redirect them to login.php
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create DashboardModel object
      $this->dashboardModel = new DashboardModel();
    }
  }

  // Fetches
  public function getPages(): array
  {
    return $this->dashboardModel->fetchPages();
  }

  public function getRecentUsers(): array
  {
    return $this->dashboardModel->fetchRecentUsers();
  }

}
