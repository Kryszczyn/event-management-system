<?php
    ini_set("error_reporting", 1);
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';

    $type = $_POST["type"];

    if($type == "ADD_EVENT"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
    
        ?>

        <h1 class="text-center text-primary">Dodaj wydarzenie</h1>
        <div class="row my-4">
            <div class="col-4">
                <label for="name">Nazwa</label>
                <input 
                    type="text" 
                    class="form-control remodal_input" 
                    id="name" 
                    placeholder="Nazwa"
                    data-name="name"
                />
            </div>
            <div class="col-4">
                <label for="date">Data wydarzenia</label>
                <input 
                    type="datetime-local" 
                    class="form-control remodal_input" 
                    id="date" 
                    placeholder="Data wydarzenia" 
                    data-name="date_event"
                />
            </div>
            <div class="col-4">
                <label for="count">Ilość biletów</label>
                <input 
                    type="number" 
                    class="form-control remodal_input" 
                    id="count" 
                    placeholder="Ilość biletów"
                    data-name="ticket_counter" 
                />
            </div>
        </div>

        <input class="hidden_input_redirect" type="hidden" data-name="ADD_EVENT_UPDATE" />
        
        <?php
    }
    if($type == "ADD_TICKET"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';

        $event = new Events();
        $all_events = $event->select_events();
    
        ?>

        <h1 class="text-center text-primary">Dodaj bilet</h1>
        <div class="row my-4">
            <div class="col-6">
                <label for="name">Nazwa</label>
                <input 
                    type="text" 
                    class="form-control remodal_input" 
                    id="name" 
                    placeholder="Nazwa"
                    data-name="name"
                />
            </div>
            <div class="col-6">
                <label for="event">Wydarzenie</label>
                <select
                    class="form-control remodal_select" 
                    id="event" 
                    data-name="event_id"
                >
                    <?php foreach($all_events as $k => $v): ?>
                    <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <input class="hidden_input_redirect" type="hidden" data-name="ADD_TICKET_UPDATE" />
        
        <?php
    }
    
    if($type == "ADD_PAYMENT"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';

        $event = new Events();
        $all_events = $event->select_events();

        $ticket = new Ticket();
        $all_tickets = $ticket->select_ticket();
    
        ?>

        <h1 class="text-center text-primary">Dodaj płatność</h1>
        <div class="row my-4">
            <div class="col-4">
                <label for="name">Nazwa</label>
                <input 
                    type="text" 
                    class="form-control remodal_input" 
                    id="name" 
                    placeholder="Nazwa"
                    data-name="name"
                />
            </div>
            <div class="col-4">
                <label for="event">Wydarzenie</label>
                <select
                    class="form-control remodal_select" 
                    id="event" 
                    data-name="event_id"
                >
                    <?php foreach($all_events as $k => $v): ?>
                    <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="event">Bilet</label>
                <select
                    class="form-control remodal_select" 
                    id="event" 
                    data-name="ticket_id"
                >
                    <?php foreach($all_tickets as $k => $v): ?>
                    <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <input class="hidden_input_redirect" type="hidden" data-name="ADD_PAYMENT_UPDATE" />
        
        <?php
    }

    if($type == "ADD_USER"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';

        $event = new Events();
        $all_events = $event->select_events();

        $ticket = new Ticket();
        $all_tickets = $ticket->select_ticket();
    
        ?>

        <h1 class="text-center text-primary">Dodaj płatność</h1>
        <div class="row my-4">
            <div class="col-4">
                <label for="name">Nazwa</label>
                <input 
                    type="text" 
                    class="form-control remodal_input" 
                    id="name" 
                    placeholder="Nazwa"
                    data-name="name"
                />
            </div>
            <div class="col-4">
                <label for="event">Wydarzenie</label>
                <select
                    class="form-control remodal_select" 
                    id="event" 
                    data-name="event_id"
                >
                    <?php foreach($all_events as $k => $v): ?>
                    <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="event">Bilet</label>
                <select
                    class="form-control remodal_select" 
                    id="event" 
                    data-name="ticket_id"
                >
                    <?php foreach($all_tickets as $k => $v): ?>
                    <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <input class="hidden_input_redirect" type="hidden" data-name="ADD_PAYMENT_UPDATE" />
        
        <?php
    }
?>