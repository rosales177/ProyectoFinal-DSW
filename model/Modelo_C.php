<?php

    class Modelo{
        private $conexion;

        public function __construct($conet)
        {
            $this->conexion = $conet;
        }
        public function Listar(){
            $sql = "SELECT id,Nombre,Apellido,DNI,Nom_Dis,Direccion,Telefono,Correo,Genero
             FROM tb_cliente as tb1 join tb_distrito as tb2 on (tb1.Distrito = tb2.Cod_Dis)";
            $stm = $this->conexion->prepare($sql);
            $stm->execute();

            $table = $stm->fetchAll();
            $json = array();
            foreach($table as $fila){
                $json[] = array(
                    'id' => $fila['id'],
                    'Nombre' => $fila['Nombre'],
                    'Apellido' => $fila['Apellido'],
                    'DNI' => $fila['DNI'],
                    'Distrito' => $fila['Nom_Dis'],
                    'Direccion' => $fila['Direccion'],
                    'Telefono' => $fila['Telefono'],
                    'Correo' => $fila['Correo'],
                    'Genero' => $fila['Genero']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;
        }
        public function Listar_Distrito(){
            $sql = "SELECT * FROM tb_distrito";
            $stm_distrito = $this->conexion->prepare($sql);
            $stm_distrito->execute();

            $tabla = $stm_distrito->fetchAll();
            $json = array();
            foreach($tabla as $fila){
                $json[] = array(
                    'Cod_Dis' => $fila['Cod_Dis'],
                    'Nom_Dis' => $fila['Nom_Dis']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;
        }
        public function Nuevo_Cliente($Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero){
            $sql="INSERT INTO tb_cliente (Nombre,Apellido,DNI,Distrito,Direccion,Telefono,Correo,Genero)
            values ('$Nombre','$Apellido','$Dni','$Distrito','$Direccion','$Telefono','$Correo','$Genero')";

            $stm_agregarC = $this->conexion->prepare($sql);
            $stm_agregarC->execute();
            return 'Cliente Agregado';
        }
        public function Buscar($datos){
            $sql = "SELECT * FROM tb_cliente where Nombre Like '$datos%' or Apellido LIKE '%$datos%' ";
            $stm = $this->conexion->prepare($sql);
            $stm->execute();

            $table = $stm->fetchAll();
            $json = array();
            foreach($table as $fila){
                $json[] = array(
                    'id' => $fila['id'],
                    'Nombre' => $fila['Nombre'],
                    'Apellido' => $fila['Apellido'],
                    'DNI' => $fila['DNI'],
                    'Distrito' => $fila['Distrito'],
                    'Direccion' => $fila['Direccion'],
                    'Telefono' => $fila['Telefono'],
                    'Correo' => $fila['Correo'],
                    'Genero' => $fila['Genero']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;
        }
        public function Eliminar($id){
            $sql="DELETE FROM tb_cliente WHERE id= '$id'";
            $stm_delete = $this->conexion->prepare($sql);
            $stm_delete->execute();
            return "Tarea Eliminada";
        }
        public function Actualizar($id){
            $sql = "SELECT id,Nombre,Apellido,DNI,Nom_Dis,Direccion,Telefono,Correo,Genero
             FROM tb_cliente as tb1 join tb_distrito as tb2 on (tb1.Distrito = tb2.Cod_Dis)
             where id = '$id'";
           $stm = $this->conexion->prepare($sql);
           $stm->execute();

           $table = $stm->fetchAll();
           $json = array();
           foreach($table as $fila){
               $json[] = array(
                   'id' =>$fila['id'],
                   'Nombre' => $fila['Nombre'],
                   'Apellido' => $fila['Apellido'],
                   'DNI' => $fila['DNI'],
                   'Distrito' => $fila['Nom_Dis'],
                   'Direccion' => $fila['Direccion'],
                   'Telefono' => $fila['Telefono'],
                   'Correo' => $fila['Correo'],
                   'Genero' => $fila['Genero']
               );
           }
           $jsonstring = json_encode($json);
           return $jsonstring;
        }
        public function Editar($id,$Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero){
            $sql = "UPDATE tb_cliente SET
             Nombre='$Nombre', Apellido='$Apellido', DNI ='$Dni', Distrito='$Distrito', Direccion = '$Direccion', Telefono = '$Telefono', Correo ='$Correo',Genero ='$Genero'
              WHERE id = '$id'";
            $stm_update = $this->conexion->prepare($sql);
            $stm_update->execute();

            return 'Datos Actualizados';
        }

    }
?>