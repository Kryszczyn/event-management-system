<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
            session_start();
            ini_set("error_reporting", 0);
            $title = "Płatności";
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/public/head.php';
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Privilenges.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Payment.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';


            $user = new User();
            $id = $_SESSION['id_user'];
            $all_users = $user->select_users();


            foreach($all_users as $k => $v){
              if($id == $v->id){
                $name = $v->name;
                $surname = $v->surname;
                $user_privilenges = $v->privillenges_id;
              }
            }

            $privilenges_name = get_user_privilenges_name($user_privilenges);

            $event = new Events();
            $all_events = $event->select_events();

            $payment = new Payment();
            $all_payments = $payment->select_payment();

            $ticket = new Ticket();
            $all_tickets = $ticket->select_ticket();
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
                <h6 class="text-white text-capitalize px-3">Lista Płatności</h6>
                <button 
                      class="btn btn-info text-white me-4 remodal-open" 
                      style="background-color: #196AFF;" 
                      data-type="ADD_PAYMENT"
                      data-values=""
                      type="button"
                >
                  Dodaj Płatność
                </button>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nazwa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Wydarzenie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bilet</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dodał</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $payment_status_tab = generate_status_type_text(2);
                    foreach($all_payments as $k => $v): 
                    ?>

                    <tr>
                      <td>
                        <p class="px-2 my-auto text-sm font-weight-bold"><?php echo $v->name; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $all_events[$v->event_id]->name; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $all_tickets[$v->ticket_id]->name; ?></p>
                      </td>
                      <td>
                        <p class="my-auto text-sm font-weight-bold"><?php echo $all_users[$v->user_id]->name . ' ' . $all_users[$v->user_id]->surname; ?></p>
                      </td>
                      <td>
                        <?php echo $payment_status_tab[$v->status]; ?>
                      </td>
                      <?php
                        if($user_privilenges == 1){
                          echo '<td>';
                            if($v->status == 1){
                              echo '<button 
                                          class="btn btn-primary ms-2 edit_status" 
                                          style="background-color: #28a745; box-shadow:none;"
                                          data-type="EDIT_PAYMENT_STATUS"
                                          data-id="'.$v->id.'"
                                          data-value="2"
                              >Zrealizuj</button>';
                            }
                            if($v->status != 3){

                              echo '<button 
                                          class="btn btn-primary ms-2 edit_status" 
                                          style="background-color: #696969; box-shadow:none;"
                                          data-type="EDIT_PAYMENT_STATUS"
                                          data-id="'.$v->id.'"
                                          data-value="3"
                                          >
                              Wycofaj</button>';
                            }
                          echo '</td>';
                        }
                        else{
                          echo '<td>';
                          if($v->status != 3 && $v->user_id == $id) {
                            echo '<button 
                                        class="btn btn-primary edit_status" 
                                        style="background-color: #696969; box-shadow:none;"
                                        data-type="EDIT_PAYMENT_STATUS"
                                        data-id="'.$v->id.'"
                                        data-value="3"
                            >Wycofaj</button>';
                          echo '</td>';
                          }
                        }
                      
                      ?>
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