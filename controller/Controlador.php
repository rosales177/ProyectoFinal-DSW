<?php
    require_once "../config/Conexion.php";
    require_once "../model/Modelo_C.php";
$consulta = new Modelo($conexion);
    if(isset($_GET['action'])){
        $action = $_GET['action'];

        if($action == 'L'){
            echo $consulta->Listar();
        }
    }
    if(isset($_GET['agregar'])){
        $agregar = $_GET['agregar'];
        if($agregar == 'AC'){
            $Nombre = $_POST['Nombre'];
            $Apellido = $_POST['Apellido'];
            $Dni = $_POST['Dni'];
            $Distrito = $_POST['Distrito'];
            $Direccion = $_POST['Direccion'];
            $Telefono = $_POST['Telefono'];
            $Correo = $_POST['Correo'];
            $Genero = $_POST['Genero'];
            echo $consulta->Nuevo_Cliente($Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero);
        }
    }
    if(isset($_GET['Listar'])){
        echo $consulta->Listar_Distrito();
    }

    if(isset($_GET['buscar'])){
        $datos = $_POST['buscar'];
        echo $consulta->Buscar($datos);
    }
    if(isset($_GET['delete'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            echo $consulta->Eliminar($id);
        }   
    }
    if(isset($_GET['update'])){
        if(isset($_POST['id'])){
        $id = $_POST['id'];
            echo $consulta->Actualizar($id);
        }
    }
    if(isset($_GET['editar'])){
        $id = $_POST['id'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Dni = $_POST['Dni'];
        $Distrito = $_POST['Distrito'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $Correo = $_POST['Correo'];
        $Genero = $_POST['Genero'];

        echo $consulta->Editar($id,$Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero);
    }

?>