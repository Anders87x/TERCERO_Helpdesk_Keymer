<?php
    /*TODO: llamada a las clases necesarias */
    require_once("../config/conexion.php");
    require_once("../models/Whatsapp.php");
    $whatsapp = new Whastapp();

    /*TODO: opciones del controlador */
    switch ($_GET["op"]) {
        /*TODO: enviar ticket abierto con el ID */
        case "w_ticket_abierto":
            $whatsapp->w_ticket_abierto($_POST["tick_id"]);
            break;
        /*TODO: enviar ticket Cerrado con el ID */
        case "w_ticket_cerrado":
            $whatsapp->w_ticket_cerrado($_POST["tick_id"]);
            break;
        /*TODO: enviar ticket Asignado con el ID */
        case "w_ticket_asignado":
            $whatsapp->w_ticket_asignado($_POST["tick_id"]);
            break;
    }
?>