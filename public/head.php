
    <?php
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/modal.css">
    <script src="./../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./assets/js/notify.min.js"></script>
    <link href="./assets/css/icons.css" rel="stylesheet" />
    <link href="./assets/css/svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="./assets/css/dashboard.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Modal -->
    <div class="remodal">
        <div class="remodal__content">
            <div class="remodal__data">

                
            </div>
            <div class="remodal__btns">
                <button class="remodal__btn cancel">Anuluj</button>
                <button class="remodal__btn ok">Ok</button>
            </div>
            <span href="#" class="remodal__close">&times;</span>
        </div>
      </div>