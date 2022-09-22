<!-- TODO: Index para no mostrar archivos de la carpeta models -->
<?php
    /* TODO: Cadena de Conexion */
    require_once("../config/conexion.php"); 
    /* TODO: Ruta Login */
    header("Location:".Conectar::ruta()."index.php");
?>