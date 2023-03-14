<?php
    $user_id = $_SESSION['id_user'];

    $user = new User();
    $user_data = $user->select_custom_users("id = '$user_id'");
    $user_privilenges = null;
    foreach($user_data as $k => $v){
        $user_privilenges = $v->privillenges_id;
    }

?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="./assets/img/logo.svg" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="./dashboard.php" data-link="dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">event</i>
            </div>
            <span class="nav-link-text ms-1">Wydarzenia</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./payments.php" data-link="payments">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payments</i>
            </div>
            <span class="nav-link-text ms-1">Płatności</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./tickets.php" data-link="tickets">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">Bilety</span>
          </a>
        </li>
        <?php
            if($user_privilenges == 1){
                echo '
                <li class="nav-item">
                    <a class="nav-link text-white" href="./users.php" data-link="users">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">people</i>
                        </div>
                        <span class="nav-link-text ms-1">Użytkownicy</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./privilenges.php" data-link="privilenges">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">manage_accounts</i>
                        </div>
                        <span class="nav-link-text ms-1">Uprawnienia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./status.php" data-link="status">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">info</i>
                        </div>
                        <span class="nav-link-text ms-1">Statusy</span>
                    </a>
                </li>';
            }
        ?>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <button class="btn sidenav-bg-gradient-primary mt-4 w-100 logout_btn" style="color:#fff" type="button">Wyloguj</button>
      </div>
    </div>
  </aside>