<?php
    class Area extends Conectar{

        /* TODO:Todos los registros */
        public function get_area(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_area WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert */
        public function insert_area($area_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_area (area_id, area_nom, est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $area_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update */
        public function update_area($area_id,$area_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_area set
                area_nom = ?
                WHERE
                area_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $area_nom);
            $sql->bindValue(2, $area_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_area($area_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_area SET
                est = 0
                WHERE
                area_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $area_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_area_x_id($area_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_area WHERE area_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $area_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>