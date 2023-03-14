<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
            session_start();
            ini_set("error_reporting", 0);
            $title = "Statusy";
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/public/head.php';
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Privilenges.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/StatusType.php';

            
            $user = new User();
            $id = $_SESSION['id_user'];
            $all_users = $user->select_users();

            $status_type = new StatusType();
            $all_status_type = $status_type->select_status_type();


            foreach($all_users as $k => $v){
              if($id == $v->id){
                $name = $v->name;
                $surname = $v->surname;
                $user_privilenges = $v->privillenges_id;
              }
            }

            $privilenges_name = get_user_privilenges_name($user_privilenges);

?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  
  <?php require './sidenav.php'; ?>


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <?php require './navInfo.php'; ?>


      <div class="row mt-4">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="sidenav-bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center justify-content-between">
                <h6 class="text-white text-capitalize px-3">Lista Statusów</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Typ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($all_status_type as $k => $v): 
                    ?>

                    <tr>
                      <td>
                        <p class="px-2 my-auto text-center text-sm font-weight-bold"><?php echo $v->id ?></p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center justify-content-center">
                          <p class="p-0 m-0 text-center text-sm font-weight-bold"><?php echo $v->type; ?></p>
                          <a href="./status_value.php?ids=<?php echo $v->id; ?>">
                            <span class="material-icons-round m-0" style="cursor:pointer; color:#196AFF;">double_arrow</span>
                          </a>
                        </div>
                      </td>
                    </tr>

                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php require './foot.php'; ?>
</body>

</html>