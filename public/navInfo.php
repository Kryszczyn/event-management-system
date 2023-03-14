<?php
    session_start();
    ini_set("error_reporting", 1);
    require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Privilenges.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Payment.php';

    $user = new User();
    $all_users = $user->select_users();


    $event = new Events();
    $all_events = $event->select_events();

    $all_events_ticket_counter = 0;

    foreach($all_events as $k => $v){
      $all_events_ticket_counter += $v->ticket_counter;
    }

    $payment = new Payment();
    $ended_payments = $payment->select_custom_payments("status = '2'");

?>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav>
          <h6 class="font-weight-bolder mb-0"><?php echo $title; ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <i class="fa fa-user me-sm-1 nav-link text-body font-weight-bold px-0"></i>
                <span class="d-sm-inline d-none"><?php echo $name . ' ' . $surname; ?><br> <?php  echo $privilenges_name; ?></span>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Liczba wydarzeń</p>
                <h4 class="mb-0"><?php echo count($all_events); ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Liczba użytkowników</p>
                <h4 class="mb-0"><?php echo count($all_users); ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">confirmation_number</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Liczba dostępnych biletów</p>
                <h4 class="mb-0"><?php echo $all_events_ticket_counter; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">payments</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Liczba wykonanych płatności</p>
                <h4 class="mb-0"><?php echo count($ended_payments); ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      