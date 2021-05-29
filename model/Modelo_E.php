<?php

    class Modelo_E{
        private $conexion;

        public function __construct($conet)
        {
            $this->conexion = $conet;
        }
        public function Listar_E(){
            $sql="SELECT * FROM tb_empleado";
            $stm_listar_E = $this->conexion->prepare($sql);
            $stm_listar_E->execute();

            $table = $stm_listar_E->fetchAll();
            $json = array();
            foreach($table as $fila){
                $json[] = array(
                    'Cod_Empleado' => $fila['Cod_Empleado'],
                    'Nombre_E' => $fila['Nombre_E'],
                    'Apellido_E' => $fila['Apellido_E'],
                    'Usuario' => $fila['Usuario'],
                    'Pass' => $fila['Pass']
                );
            }
            $jsonString = json_encode($json);
            return $jsonString;
        }
        public function Nuevo_E($Codigo,$Nombre,$Apellido,$Usuario,$Pass){
            $sql="INSERT INTO tb_empleado values('$Codigo','$Nombre','$Apellido','$Usuario','$Pass')";
            $stm_agregarE = $this->conexion->prepare($sql);
            $stm_agregarE->execute();
            return 'Empleado Agregado';
        }
        public function Eliminar_E($id){
            $sql="DELETE FROM tb_empleado where Cod_Empleado='$id'";
            $stm_eliminar_E = $this->conexion->prepare($sql);
            $stm_eliminar_E->execute();
            return 'Empleado Eliminado';
        }
        public function Insertar_E($id){
            $sql = "SELECT * FROM tb_empleado where Cod_Empleado='$id'";
            $stm_insertar_E = $this->conexion->prepare($sql);
            $stm_insertar_E->execute();
            $table = $stm_insertar_E->fetchAll();
            $json =array();
            foreach($table as $fila){
                $json[] = array(
                    'Cod_Empleado' => $fila['Cod_Empleado'],
                    'Nombre_E' => $fila['Nombre_E'],
                    'Apellido_E' => $fila['Apellido_E'],
                    'Usuario' => $fila['Usuario'],
                    'Pass' => $fila['Pass']
                );
            }
            $jsonString = json_encode($json);
            return $jsonString;
        }
        public function Editar_E($Codigo,$Nombre,$Apellido,$Usuario,$Pass){
            $sql ="UPDATE tb_empleado set 
            Cod_Empleado='$Codigo',Nombre_E='$Nombre',Apellido_E='$Apellido',Usuario = '$Usuario',Pass ='$Pass'
            Where Cod_Empleado = '$Codigo'";
            $stm_actualizar_E = $this->conexion->prepare($sql);
            $stm_actualizar_E->execute();

            return 'Datos Actualizados';
        }
    }

?>