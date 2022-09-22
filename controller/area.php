<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo Area */
    require_once("../models/Area.php");
    $area = new Area();

    /*TODO: opciones del controlador Area*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo area_id esta vacio */
        case "guardaryeditar":
            if(empty($_POST["area_id"])){
                $area->insert_area($_POST["area_nom"]);
            }
            else {
                $area->update_area($_POST["area_id"],$_POST["area_nom"]);
            }
            break;

        /* TODO: Listado de area segun formato json para el datatable */
        case "listar":
            $datos=$area->get_area();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["area_nom"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["area_id"].');"  id="'.$row["area_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["area_id"].');"  id="'.$row["area_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        /* TODO: Actualizar estado a 0 segun id de area */
        case "eliminar":
            $area->delete_area($_POST["area_id"]);
            break;
        
        /* TODO: Mostrar en formato JSON segun area_id */
        case "mostrar";
            $datos=$area->get_area_x_id($_POST["area_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["area_id"] = $row["area_id"];
                    $output["area_nom"] = $row["area_nom"];
                }
                echo json_encode($output);
            }
            break;
        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $area->get_area();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['area_id']."'>".$row['area_nom']."</option>";
                }
                echo $html;
            }
            break;
    }
?>