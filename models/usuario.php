<?php
    require_once "config/coneccion.php";

    class usuario{

        public static function getAll(){
            $db = new connection();
            $query = "SELECT * FROM mascota_hobbies";
            $resultado = $db->query($query);
            $dato = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $dato[]=[
                        'id'=> $row['id'],
                        'id_mascota'=> $row['id_mascota'],
                        'nombre_hobby'=> $row['nombre_hobby'],
                        'frecuencia'=> $row['frecuencia'],
                        'agenda'=> $row['agenda'],
                        'fecha_creacion'=> $row['fecha_creacion'],
                    ];
                }//end whilw
                return $dato;
            }
            return $dato;
        }//end getAll

        public static function getWhere($id_usuario){
            $db = new connection();
            $query = "SELECT * FROM mascota_hobbies Where id = $id_usuario";
            $resultado = $db->query($query);
            $dato = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $dato[]=[
                        'id'=> $row['id'],
                        'id_mascota'=> $row['id_mascota'],
                        'nombre_hobby'=> $row['nombre_hobby'],
                        'frecuencia'=> $row['frecuencia'],
                        'agenda'=> $row['agenda'],
                        'fecha_creacion'=> $row['fecha_creacion'],
                    ];
                }//end whilw
                return $dato;
            }
            return $dato;
        }//end getAll

        public static function insert($id_mascota, $nombre_hobby, $frecuencia, $agenda, $fecha_creacion){
            $db = new connection();
            $query = "INSERT INTO mascota_hobbies(id_mascota, nombre_hobby, frecuencia, agenda, fecha_creacion)
            values('".$id_mascota."','".$nombre_hobby."','".$frecuencia."','".$agenda."','".$fecha_creacion."')";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;
        }

        public static function update($id_usuario, $id_mascota, $nombre_hobby, $frecuencia, $agenda, $fecha_creacion){
            $db = new connection();
            $query = "UPDATE mascota_hobbies SET 
            id_mascota ='".$id_mascota."', nombre_hobby = '".$nombre_hobby."', frecuencia = '".$frecuencia."', agenda = '".$agenda."', fecha_creacion = '".$fecha_creacion."' 
            WHERE id=$id_usuario" ;
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;
        }

        public static function delete($id_usuario) {
            $db = new connection();
            $query = "DELETE FROM mascota_hobbies WHERE id=$id_usuario";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;
        }//END DELETE


    }//end class usuario
