<?php

require_once('controller.php');
require_once('./model/dashboard-model.php');

class Dashboard extends Controller
{

  public string $active = 'dashboard'; // For highlighting the active link
  private DashboardModel $dashboardModel;

  /**
   * Dashboard constructor
   */
  public function __construct()
  {
    // Check if user is logged in
    if (!isset($_SESSION['auth_status'])) {
      // If not logged in, redirect them to login.php
      header("Location: login.php");
    } else {
      // User is logged in so create new model object
      $this->dashboardModel = new DashboardModel();
    }
  }

  /**
   * Fetches all pages for the logged in user
   * @return array
   */
  public function getPages(): array
  {
    return $this->dashboardModel->fetchPages();
  }

  /**
   * Fetches list of five most recently created users
   * @return array
   */
  public function getRecentUsers(): array
  {
    return $this->dashboardModel->fetchRecentUsers();
  }
}
