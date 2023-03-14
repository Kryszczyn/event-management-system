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
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/StatusValue.php';

            $ids = $_GET["ids"];

            
            $user = new User();
            $id = $_SESSION['id_user'];
            $all_users = $user->select_users();

            $status_type = new StatusType();
            $all_status_type = $status_type->select_status_type();

            $status_value = new StatusValue();
            $all_status_value = $status_value->select_custom_status_value("status_type_id = '$ids'");

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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Wartość</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Kolor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Nazwa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($all_status_value as $k => $v): 
                    ?>

                    <tr>
                      <td>
                        <p class="px-2 my-auto text-center text-sm font-weight-bold"><?php echo $v->id ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-center text-sm font-weight-bold"><?php echo $v->status_type_id; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-center text-sm font-weight-bold"><?php echo $v->value; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-center text-sm font-weight-bold"><?php echo $v->color; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-center text-sm font-weight-bold" style="color:<?php echo $v->color; ?>;"><?php echo $v->name; ?></p>
                      </td>
                      <td>
                        <?php 
                        echo $v->status == 1 ? 
                        '<p class="my-auto text-center text-sm font-weight-bold" style="color:#28a745;">Aktywny</p>' 
                        : '<p class="my-auto text-center text-sm font-weight-bold" style="color:#dc3545;">Nieaktywny</p>' ;
                        ?>
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