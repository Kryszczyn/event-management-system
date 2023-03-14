<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
            session_start();
            ini_set("error_reporting", 0);
            $title = "Użytkownicy";
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/public/head.php';
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Privilenges.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
            


            $user = new User();
            $id = $_SESSION['id_user'];
            $all_users = $user->select_users();

            $privilenges = new Privilenges();
            $all_privilenges = $privilenges->select_privilenges();


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
                <h6 class="text-white text-capitalize px-3">Lista użytkowników</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Imię</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Nazwisko</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Typ</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Login</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hasło</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">E-mail</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Data utworzenie konta</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Data ostatniego logowania</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $users_status_tab = generate_status_type_text(5);
                    foreach($all_users as $k => $v): 
                    ?>

                    <tr>
                      <td>
                        <p class="px-2 my-auto text-sm font-weight-bold"><?php echo $v->name ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->surname; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $all_privilenges[$v->privillenges_id]->name; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->login ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->password_crypted ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->email ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->date_of_create ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $v->date_of_last_login ?></p>
                      </td>
                      <td>
                        <?php echo $users_status_tab[$v->status]; ?>
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