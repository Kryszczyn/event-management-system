<?php
    if(!function_exists("cPrintR")){
        function cPrintR($arr){
            echo "<pre>".print_r($arr, true)."</pre>";
        }
    }

    if(!function_exists("get_user_privilenges_name")){
        function get_user_privilenges_name($privilenges_id){
            include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';
            include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Privilenges.php';

            $privilenges = new Privilenges();
            $data = $privilenges->select_custom_privilenges("type = '$privilenges_id'");
            $type = null;

            foreach($data as $k => $v){
                $type = $v->name;
            }

            return $type;
        }
    }

    if(!function_exists("generate_status_type_text")){
        function generate_status_type_text($status_type_id){
            include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';
            include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/StatusType.php';
            include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/StatusValue.php';

            $status_value = new StatusValue();
            $all_values_data = $status_value->select_custom_status_value("status_type_id = '$status_type_id'");

            

            $result_arr = [];

            foreach($all_values_data as $k => $v){
                $result_arr[$v->value] = "<p class='my-auto text-sm text-center font-weight-bold' style='color: $v->color;'>$v->name</p>";
            }

            return $result_arr;
        }
    }

?>